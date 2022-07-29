<?php

require_once "vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'rabbitmq', 'rabbitmq');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$date = date("Y-m-d H:i:s");

$msg = new AMQPMessage($date);
$channel->basic_publish($msg, '', 'hello');

echo " [x] $date '\n";

$channel->close();
$connection->close();