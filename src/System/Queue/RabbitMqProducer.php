<?php

    namespace System\Queue;

    use PhpAmqpLib\Channel\AMQPChannel;
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    class RabbitMqProducer {
        private AMQPStreamConnection $con;
        private AMQPChannel $channel;

        private string $callbackQueue;
        private ?string $response = null;
        private string $corrId;

        public function __construct () {
            $this->con = RabbitMqConnection::getClientConnection();
            $this->channel = $this->con->channel();

            list($this->callbackQueue, ,) = $this->channel->queue_declare(
                "",
                false,
                false,
                true,
                false
            );

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

        public function onResponse($rep) : void {

            if ($rep->get('correlation_id') == $this->corrId) {
                $this->response = $rep->body;
            }
        }

        public function call ($roomId, $firstName, $lastName, $email, $startDate, $endDate, $userId) :int {
            $this->response = null;
            $this->corrId = uniqid();

            $msg = new AMQPMessage (
                json_encode([
                    'room_id' => $roomId,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'startDate' => $startDate->format('Y-m-d H:i:s'),
                    'endDate' => $endDate->format('Y-m-d H:i:s'),
                    'user_id' => $userId,
                ]),
                array (
                    'correlation_id' => $this->corrId,
                    'reply_to' => $this->callbackQueue
                )
            );

            $this->channel->basic_publish ($msg, '', 'rest-api_queue');
            while (!$this->response) {
                $this->channel->wait();
            }

            return intval($this->response);
        }
    }