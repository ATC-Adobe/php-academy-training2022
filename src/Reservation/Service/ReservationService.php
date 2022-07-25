<?php

    namespace Reservation\Service;

    use Room\Model\RoomModel;
    use Room\Repository\RoomRepository;
    use Reservation\Model\ReservationModel;
    use Reservation\Repository\ReservationRepository;
    use User\Repository\UserRepository;
    use System\Session\Session;

    class ReservationService {
        private Session $session;
        public function __construct() {
            $this->session = Session::getInstance();
        }

        public function addReservation () :bool {
            $repo = new ReservationRepository();
            $id         = 0;
            $roomId     = htmlspecialchars($_POST['roomId']);
            $firstName  = htmlspecialchars($_POST['firstName']);
            $lastName   = htmlspecialchars($_POST['lastName']);
            $email      = htmlspecialchars($_POST['email']);
            $startDate  = $repo->createDate(htmlspecialchars($_POST['startDate']), true);
            $endDate    = $repo->createDate(htmlspecialchars($_POST['endDate']), true);
            $userId = $this->session->get('user_id');

            $userRepo   = new UserRepository();
            $user       = $userRepo->getUserById($userId);

            $roomRepository = new RoomRepository();
            $r      = $roomRepository->getById($roomId);
            $room   = new RoomModel($r->getId(), $r->getName(), $r->getFloor());

            $reservation = new ReservationModel(
                $id, $room, $firstName, $lastName,
                $email, $startDate, $endDate, $user
            );

            if ($repo->addReservation($reservation)) {
                return true;
            }
            return false;
        }

        public function deleteReservation () :void {
            $id = htmlspecialchars($_POST['id']);
            $repo = new ReservationRepository();
            $repo->deleteReservation($id);
        }
    }