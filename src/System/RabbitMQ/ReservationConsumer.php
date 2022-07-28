<?php

namespace System\RabbitMQ;

use Model\Reservation\Service\ReservationAdder;
use PhpAmqpLib\Message\AMQPMessage;
use System\File\FileWriterFactory;
use System\Status;

class ReservationConsumer {

    public function __construct() {

        // connect to queue
        $connection = RabbitMQConnection::constructClientConnection();
        $channel = $connection->channel();
        $channel->queue_declare('rpc_queue', false, false, false, false);

        echo " [x] Awaiting RPC requests\n";


        $callback = function ($req) {
            // request body
            $n = ($req->body);
            echo ' [.] req(', $n, ")\n";

            // process request with $this->consume and return status code
            $msg = new AMQPMessage(
                (string) $this->consume($n),
                array('correlation_id' => $req->get('correlation_id'))
            );

            // publish message
            $req->delivery_info['channel']->basic_publish(
                $msg,
                '',
                $req->get('reply_to')
            );
            $req->ack();
        };

        // reading queue entries
        $channel->basic_qos(null, 1, null);
        $channel->basic_consume('rpc_queue', '', false, false, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }

    private function consume(string $args) : int {

        // unpack data from json
        $dec = json_decode($args, true);

        $id         = intval($dec['id']);
        $roomId     = intval($dec['room_id']);
        $from       = new \DateTime($dec['from']);
        $to         = new \DateTime($dec['to']);


        // call ReservationService
        $status =  (new ReservationAdder())->uploadData(
            (new FileWriterFactory())
                ->getInstance('db'),
            $roomId, $id, $from, $to,
        );

        // append new log entry with shell command `echo 'message' >> file`
        shell_exec('echo "['
            .(new \DateTime())->format('Y-m-d H:i:s')
            .' Request: {UID: '.$id.' RoomID: '.$roomId.' From: '.$dec['from'].' To: '.$dec['to'].'} ended with status code: '.
            $status.' ('.Status::getString($status)[1].')]" >> reservations/queue.log');

        return $status;
    }

}