<?php

require_once "vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localwsl.com', 5672, 'rabbitmq', 'rabbitmq');
$channel = $connection->channel();

$channel->queue_declare('addReservation', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    $dataReservation = (json_decode($msg->body, true));
    //TODO dodać walidację
    $service = new \Reservation\ReservationService();
    $service->createReservation($dataReservation);
    echo ' [x] Received ', $msg->body, "\n";
    sleep(3);

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