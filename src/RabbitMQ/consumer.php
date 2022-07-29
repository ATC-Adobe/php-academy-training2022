<?php

require_once "vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Reservation\ReservationService;

$connection = new AMQPStreamConnection('localwsl.com', 5672, 'rabbitmq', 'rabbitmq');
$channel = $connection->channel();

//stworzenie kolejki
$channel->queue_declare('addReservation', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

//odkodowanie danych z formatu json
$callback = function ($msg) {
    $dataReservation = (json_decode($msg->body, true));

    //TODO dodać walidację
    $service = new ReservationService();
    $service->createReservation($dataReservation);

    // wyświetlenie w terminalu danych, które zostały dodane do bazy danych
    echo ' [x] Received ', $msg->body, "\n";

    // jeśli w kolejce będzie kilka żądań, to mają się pojawić w kilkusekundowych odstępach
    sleep(3);

    // funkcja shell_exec pozwala na pisanie komend bash - w tym przypadku dodawanie logów do pliku queue.log
    shell_exec(
        "echo 'Dodano rezerwację " . $msg->body ."' >> queue.log"
    );
};

// basic_consume pobiera żadania z kolejki
$channel->basic_consume('addReservation', '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}

$channel->close();
$connection->close();