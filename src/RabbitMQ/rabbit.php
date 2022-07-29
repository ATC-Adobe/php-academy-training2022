<?php

require_once "../../vendor/autoload.php";

require_once "../Api/Rest/Reservation/ReservationApi.php";
require_once "../RabbitMQ/ApiReservationProducer.php";

use RabbitMq\ApiReservationProducer;
use PhpAmqpLib\Message\AMQPMessage;
use Api\Reservation\ReservationApi;
use PhpAmqpLib\Connection\AMQPStreamConnection;

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    try {
        echo json_encode(['message' => "Unauthorized access"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
    $api = new ReservationApi();

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
        $connection = new AMQPStreamConnection('localhost', 5672, 'rabbitmq', 'rabbitmq');
        $channel = $connection->channel();

        $channel->queue_declare('addReservation', false, false, false, false);

        $dataReservation = $api->addReservation($dataReservation);

        $msg = new AMQPMessage($dataReservation);
        $channel->basic_publish($msg, '', 'hello');

        echo " [x] Dodawanie przez Rabita '\n";

        $channel->close();
        $connection->close();
    } catch (JsonException $e) {
    }
}


//if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header("WWW-Authenticate: Basic realm=\"Private Area\"");
//    header("HTTP/1.0 401 Unauthorized");
//    try {
//        echo json_encode(['message' => "Unauthorized access"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//    }
//} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
//    $api = new ReservationApi();
//    $reservationRoom = $api->addReservation();
//
//    header("Content-Type: application/json");
//    try {
//        $msg = new AMQPMessage($reservationRoom);
//
//        $producer = new ApiReservationProducer();
//        $producer->addReservation($msg);
//    } catch (JsonException $e) {
//    }
//}
