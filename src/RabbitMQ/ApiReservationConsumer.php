<?php

class ApiReservationConsumer
{
    public function __construct()
    {
        $connection = RabbitMQConnection::constructClientConnection();

        $channel = $connection->channel();

        $channel->queue_declare('rpc_queue', false, false, false, false);

        echo " [x] Awaiting RPC requests\n";
        $callback = function ($req) {
            $n = ($req->body);
            echo ' [.] req(', $n, ")\n";

            $msg = new AMQPMessage(
                (string)$this->consume($n),
                array('correlation_id' => $req->get('correlation_id'))
            );

            $req->delivery_info['channel']->basic_publish(
                $msg,
                '',
                $req->get('reply_to')
            );
            $req->ack();
        };

        $channel->basic_qos(null, 1, null);
        $channel->basic_consume('rpc_queue', '', false, false, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }

    private function consume(string $args): int
    {
        $dec = json_decode($args, true);

        $id = intval($dec['id']);
        $roomId = intval($dec['room_id']);
        $from = new \DateTime($dec['from']);
        $to = new \DateTime($dec['to']);


        $status = (new ReservationAdder())->uploadData(
            (new FileWriterFactory())
                ->getInstance('db'),
            $roomId,
            $id,
            $from,
            $to,
        );

        shell_exec(
            'echo "['
            . (new \DateTime())->format('Y-m-d H:i:s')
            . ' Request: {UID: ' . $id . ' RoomID: ' . $roomId . ' From: ' . $dec['from'] . ' To: ' . $dec['to'] . '} ended with status code: ' .
            $status . ' (' . Status::getString($status)[1] . ')]" >> reservations/queue.log'
        );

        return $status;
    }
}