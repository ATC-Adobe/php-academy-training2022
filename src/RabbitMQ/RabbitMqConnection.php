<?php

namespace RabbitMq;

require_once "../Constants/constants.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMqConnection extends AMQPStreamConnection
{
    public function __construct($host, $port, $user, $password)
    {
        parent::__construct($host, $port, $user, $password);
    }

    public static function constructProducerConnection(): RabbitMQConnection
    {
        $connection = new RabbitMQConnection(PRODUCER_HOST, PORT, USERNAME, PASSWORD);

        return $connection;
    }

    public static function constructConsumerConnection(): RabbitMQConnection
    {
        $connection = new RabbitMQConnection(CONSUMER_HOST, PORT, USERNAME, PASSWORD);

        return $connection;
    }
}