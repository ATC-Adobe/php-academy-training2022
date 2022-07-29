<?php

namespace RabbitMq;

require_once "RabbitMqConnection.php";

use PhpAmqpLib\Message\AMQPMessage;
use RabbitMq\RabbitMqConnection;

class ApiReservationProducer
{
    private $channel;
    private $connection;
    private $callback_queue;
    private $response;
    private $corr_id;

    public function __construct()
    {
        //
        $this->connection = RabbitMQConnection::constructProducerConnection();
        $this->channel = $this->connection->channel();

        // Declares queue
        $this->channel->queue_declare(
            "addReservation",
            false,
            false,
            true,
            false
        );

        /* Start a queue consumer.This method asks the server to start a "consumer", which is a transient request for messages from a specific queue */
        $this->channel->basic_consume(
            $this->callback_queue,
            '',
            false,
            true,
            false,
            false,
            //array below is a callback
            array(
                $this,
                'onResponse'
            )
        );
    }

    public function onResponse($rep)
    {
        if ($rep->get('correlation_id') == $this->corr_id) {
            $this->response = $rep->body;
        }
    }

    public function call($room_id, $id, $from, $to)
    {
        $this->response = null;
        $this->corr_id = uniqid();

        $msg = new AMQPMessage(
            json_encode([
                'room_id' => $room_id,
                'id' => $id,
                'from' => $from->format('Y-m-d H:i:s'),
                'to' => $to->format('Y-m-d H:i:s'),
            ]),
            array(
                'correlation_id' => $this->corr_id,
                'reply_to' => $this->callback_queue
            )
        );
        $this->channel->basic_publish($msg, '', 'rpc_queue');
        while (!$this->response) {
            $this->channel->wait();
        }
        return intval($this->response);
    }


}