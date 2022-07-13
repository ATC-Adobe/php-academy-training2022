<?php

    namespace Controller;

    use Reservation\Model\ReservationModel;
    use Reservation\Service\ReservationService;

    class AddReservationController {
        public function __construct() { }

        public function addReservation() :void {
            $id = 0;
            $reservation = new ReservationModel(
                $id, $_POST['roomId'], $_POST['firstName'], $_POST['lastName'],
                $_POST['email'], $_POST['startDate'], $_POST['endDate']
            );
            $reservationService = new ReservationService();

            //TODO: file with extension or database choose / some refactor
        }
    }