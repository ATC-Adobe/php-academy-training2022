<?php

namespace System\RabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQConnection extends AMQPStreamConnection {

    private const CLIENT_HOST = 'localwsl.com';
    private const CONSUMER_HOST = 'localhost';

    private const PORT = 5672;

    private const PASSWORD = 'rabbitmq';
    private const USERNAME = 'rabbitmq';


    public function __construct($host, $port, $user, $password) {
        parent::__construct($host, $port, $user, $password);
    }

    // readability improvement
    public static function constructClientConnection() : RabbitMQConnection {
        $conn = new RabbitMQConnection(self::CLIENT_HOST, self::PORT, self::USERNAME, self::PASSWORD);

        return $conn;
    }

    public static function constructConsumerConnection() : RabbitMQConnection {
        $conn = new RabbitMQConnection(self::CONSUMER_HOST, self::PORT, self::USERNAME, self::PASSWORD);

        return $conn;
    }

}