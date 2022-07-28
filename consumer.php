<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$handle = new \System\RabbitMQ\ReservationConsumer();