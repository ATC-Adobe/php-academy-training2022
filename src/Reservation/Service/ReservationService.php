<?php

    namespace Reservation\Service;

    use DateTime;
    use Room\Model\RoomModel;
    use Room\Repository\RoomRepository;
    use Reservation\Model\ReservationModel;
    use Reservation\Repository\ReservationRepository;
    use User\Repository\UserRepository;
    use System\Session\Session;

    class ReservationService {
        public function __construct() {}

        public function addReservation () :void {
            $session = Session::getInstance();

            $id         = 0;
            $roomId     = htmlspecialchars($_POST['roomId']);
            $firstName  = htmlspecialchars($_POST['firstName']);
            $lastName   = htmlspecialchars($_POST['lastName']);
            $email      = htmlspecialchars($_POST['email']);
            $startDate  = DateTime::createFromFormat("Y-m-d\TH:i", htmlspecialchars($_POST['startDate']));
            $endDate    = DateTime::createFromFormat("Y-m-d\TH:i", htmlspecialchars($_POST['endDate']));

            $userId     = $session->get('user_id');
            $userRepo   = new UserRepository();
            $user       = $userRepo->getUserById($userId);

            $roomRepository = new RoomRepository();
            $r      = $roomRepository->getById($roomId);
            $room   = new RoomModel($r->getId(), $r->getName(), $r->getFloor());

            $reservation = new ReservationModel(
                $id, $room, $firstName, $lastName,
                $email, $startDate, $endDate, $user
            );

            $repo = new ReservationRepository();
            $repo->addReservation($reservation);

        }

        public function deleteReservation () :void {
            $id = htmlspecialchars($_POST['id']);
            $repo = new ReservationRepository();
            $repo->deleteReservation($id);
        }
    }