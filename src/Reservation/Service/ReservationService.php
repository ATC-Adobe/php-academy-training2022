<?php

    namespace Reservation\Service;

    use Reservation\Model\ReservationModel;
    use Reservation\Repository\ReservationRepository;

    class ReservationService implements ReservationServiceInterface {
        public function __construct() {}

        public function saveReservation(ReservationModel $reservation) :void {

            $id         = 0;
            $roomId     = $_POST['room_id'];
            $firstName  = $_POST['firstname'];
            $lastName   = $_POST['lastname'];
            $email      = $_POST['email'];
            $startDate  = $_POST['start_date'];
            $endDate    = $_POST['end_date'];

            $reservation = new ReservationModel(
                $id, $roomId, $firstName, $lastName,
                $email, $startDate, $endDate
            );

            $reservationRepository = new ReservationRepository();
            $reservationRepository->addReservation($reservation);

        }
    }