<?php

    namespace Reservation\Service;

    use DateTime;
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
            $startDate  = DateTime::createFromFormat("Y-m-d\TH:i:s", $_POST['startDate']);
            $endDate    = DateTime::createFromFormat("Y-m-d\TH:i:s", $_POST['endDate']);

            $roomRepository = new RoomRepository();
            $r      = $roomRepository->getById($roomId);
            $room   = new RoomModel($r->getId(), $r->getName(), $r->getFloor());

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