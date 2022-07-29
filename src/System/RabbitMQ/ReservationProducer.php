<?php

namespace System\RabbitMQ;

use Model\DateTimeFormatter;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ReservationProducer {
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;
    private string $callbackQueue;
    private ?string $response = null;
    private string $corrId;

    public function __construct() {

        // connection establishment
        $this->connection = RabbitMQConnection::constructClientConnection();
        $this->channel = $this->connection->channel();
        list($this->callbackQueue, ,) = $this->channel->queue_declare(
            "",
            false,
            false,
            true,
            false
        );

        // awaiting response
        $this->channel->basic_consume(
            $this->callbackQueue,
            '',
            false,
            true,
            false,
            false,
            array(
                $this,
                'onResponse'
            )
        );
    }

    // response callback
    public function onResponse($rep) : void {

        if ($rep->get('correlation_id') == $this->corrId) {
            $this->response = $rep->body;
        }
    }

    // make request
    public function call($room_id, $id, $from, $to) : int {

        $this->response = null;
        $this->corrId = uniqid();

        // send message
        $msg = new AMQPMessage(
            json_encode([
                'room_id' => $room_id,
                'id'    => $id,
                'from'  => DateTimeFormatter::toString($from),
                'to'    => DateTimeFormatter::toString($to),
            ]),
            array(
                'correlation_id' => $this->corrId,
                'reply_to' => $this->callbackQueue
            )
        );

        // await response
        $this->channel->basic_publish($msg, '', 'rpc_queue');
        while (!$this->response) {
            $this->channel->wait();
        }

        // return response
        return intval($this->response);
    }
}