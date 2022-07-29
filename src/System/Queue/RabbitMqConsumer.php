<?php

    namespace System\Queue;

    use Api\Reservation\ReservationApi;
    use PhpAmqpLib\Channel\AMQPChannel;
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;
    use Utils\DateManager;

    class RabbitMqConsumer {

        private AMQPStreamConnection $con;
        private AMQPChannel $channel;
        private const LOG_PATH = __DIR__ . "/../Logs";

        public function __construct () {
            $this->con = RabbitMQConnection::getClientConnection();
            $this->channel = $this->con->channel();
            $this->channel->queue_declare('rest-api_queue', false, false, false, false);

            echo " [x] Awaiting RPC requests\n";

            $callback = function ($request) {
                $n = ($request->body);
                echo ' [.] req(', $n, ")\n";

                $msg = new AMQPMessage(
                    (string) $this->consume($n),
                );

                $request->delivery_info['channel']->basic_publish(
                    $msg,
                    '',
                    $request->get('reply_to')
                );
                $request->ack();
            };

            $this->channel->basic_qos(null, 1, null);
            $this->channel->basic_consume('rest-api_queue', '', false, false, false, false, $callback);

            while ($this->channel->is_open()) {
                $this->channel->wait();
            }

            $this->channel->close();
            $this->con->close();
        }

        private function consume (string $args) :mixed {
            $data = json_decode ($args, true);

            $dateManager = new DateManager();
            $date = $dateManager->getCurrentDate();

            $status = new ReservationApi();
            $returnMsg = $date." ".$status;
            $this->log($returnMsg);

            return $status;
        }

        private function log ($args) :void {
            $log  = $args.PHP_EOL;
            file_put_contents(self::LOG_PATH . "/queue.log", $log, FILE_APPEND);
        }

    }