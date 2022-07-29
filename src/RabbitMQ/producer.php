<?php

require_once "../../vendor/autoload.php";

use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Connection\AMQPStreamConnection;

// Autentykacja użytkownika
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    try {
        echo json_encode(['message' => "Unauthorized access"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataReservation = [
        'roomId' => intval($_POST['roomId']),
        'roomNumber' => intval($_POST['roomNumber']),
        'userId' => intval($_POST['userId']),
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'startDay' => date("Y-m-d", (strtotime($_POST['startDay']))),
        'endDay' => date("Y-m-d", (strtotime($_POST['endDay']))),
        'startHour' => date("H:i", (strtotime($_POST['startHour']))),
        'endHour' => date("H:i", (strtotime($_POST['endHour'])))
    ];

    header('Content-Type: application/json');
    try {
        $connection = new AMQPStreamConnection('localwsl.com', 5672, 'rabbitmq', 'rabbitmq');
        $channel = $connection->channel();

        // stworzenie kolejki
        $channel->queue_declare('addReservation', false, false, false, false);

        // zakodowanie danych do formatu json
        $msg = new AMQPMessage(json_encode($dataReservation));

        // basic_publish publikuje dane do kolejki
        $channel->basic_publish($msg, '', 'addReservation');

        echo " [x] Data was sucsessfuly uploaded by RabbitMQ \n";

        $channel->close();
        $connection->close();
    } catch (JsonException $e) {
    }
}