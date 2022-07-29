<?php

    namespace System\Queue;

    use PhpAmqpLib\Connection\AMQPStreamConnection;

    class RabbitMqConnection extends AMQPStreamConnection {

        private const AMQP_CLIENT_HOST = 'localwsl.com';
        private const AMQP_CONSUMER_HOST = 'localhost';
        private const AMQP_PORT = 5672;
        private const AMQP_USER = 'rabbitmq';
        private const AMQP_PASS = 'rabbitmq';

        protected function __construct ($host, $port, $user, $pass) {
            parent::__construct($host, $port, $user, $pass);
        }

        public static function getClientConnection () :RabbitMqConnection {
            return new RabbitMqConnection(
                self::AMQP_CLIENT_HOST,
                self::AMQP_PORT,
                self::AMQP_USER,
                self::AMQP_PASS
            );
        }

        public static function getConsumerConnection () :RabbitMqConnection {
            return new RabbitMqConnection(
                self::AMQP_CONSUMER_HOST,
                self::AMQP_PORT,
                self::AMQP_USER,
                self::AMQP_PASS
            );
        }

    }