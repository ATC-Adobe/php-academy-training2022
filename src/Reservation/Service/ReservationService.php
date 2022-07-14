<?php

    namespace Reservation\Service;

    use Room\Model\RoomModel;
    use Room\Repository\RoomRepository;
    use Reservation\Model\ReservationModel;
    use Reservation\Repository\ReservationRepository;

    class ReservationService implements ReservationServiceInterface {
        public function __construct() {}

        public function save () :void {

            $id         = 0;
            $roomId    = $_POST['roomId'];
            $firstName  = $_POST['firstName'];
            $lastName   = $_POST['lastName'];
            $email      = $_POST['email'];
            $startDate  = $_POST['startDate'];
            $endDate    = $_POST['endDate'];

            //TODO: Debug model problem and refactor
            $roomRepository = new RoomRepository();
            $r      = $roomRepository->getById($roomId);
            $room   = new RoomModel($r->getId(), $r->getName(), $r->getFloor());
            var_dump($room);

            $reservation = new ReservationModel(
                $id, $room, $firstName, $lastName,
                $email, $startDate, $endDate
            );

            $reservationRepository = new ReservationRepository();
            $reservationRepository->addReservation($reservation);

        }

        public function delete () :void {
            $reservationId = $_POST['id'];
            $reservationRepository = new ReservationRepository();
            $reservationRepository->deleteReservation($reservationId);
        }
    }