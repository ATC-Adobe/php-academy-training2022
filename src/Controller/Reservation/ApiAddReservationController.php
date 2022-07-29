<?php

    namespace Controller\Reservation;

    use System\Queue\RabbitMqProducer;

    class ApiAddReservationController {

        public function addReservation() {

            try {
                [$roomId, $firstName, $lastName, $email, $startDate, $endDate, $userId] = [
                    htmlentities(intval($_POST['roomId'])),
                    htmlentities($_POST['firstName']),
                    htmlentities($_POST['lastName']),
                    htmlentities($_POST['email']),
                    new \DateTime(htmlentities($_POST['startDate'])),
                    new \DateTime(htmlentities($_POST['endDate'])),
                    htmlentities(intval($_POST['userId']))
                ];
            } catch (\Exception $e) {
                return ['message' => $e->getMessage()];
            }

            (new RabbitMqProducer())->call(
                $roomId, $firstName, $lastName, $email, $startDate, $endDate, $userId
                );
        }
    }