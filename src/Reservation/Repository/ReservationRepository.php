<?php

    namespace Reservation\Repository;
    use DateTime;
    use Room\Model\RoomModel;
    use Reservation\Model\ReservationModel;
    use User\Repository\UserRepository;
    use System\Database\MysqlConnection;
    use System\Session\Session;
    use System\StatusHandler\Status;

    class ReservationRepository {

        public function addReservation (ReservationModel $reservation) :void {

            $session = Session::getInstance();

            $roomId     = $reservation->getRoom()->getId();
            $roomName   = $reservation->getRoom()->getName();
            $firstName  = $reservation->getFirstName();
            $lastName   = $reservation->getLastName();
            $email      = $reservation->getEmail();
            $startDate  = $reservation->getStartDate();
            $endDate    = $reservation->getEndDate();
            $user       = $reservation->getUser()->getId();

            $currentDate = new DateTime("now", new \DateTimeZone('Europe/Warsaw'));
            $path = 'Location: ./reservation.php?roomId='.$roomId.'&name='.$roomName;

            if ($startDate < $currentDate || $endDate < $currentDate) {
                $session->set('reservation', Status::RESERVATION_PAST_DATE);
                header ($path);
                die();
            }

            if ($startDate >= $endDate) {
                $session->set('reservation', Status::RESERVATION_INCORRECT_DATE);
                header ($path);
                die();
            }

            if (!$this->checkRoomAvailability($roomId, $startDate, $endDate)) {
                $session->set('reservation', Status::RESERVATION_ROOM_NOT_AVAILABLE);
                header ($path);
                die();
            }

            $startDate  = $startDate->format('d/m/y H:i:s');
            $endDate    = $endDate->format('d/m/y H:i:s');

            $query = "INSERT INTO reservations(room_id, firstname, lastname, email, start_date, end_date, user_id)
                VALUES($roomId,
                       '$firstName', 
                       '$lastName', 
                       '$email', 
                       str_to_date('$startDate', '%d/%m/%y %H:%i:%s'),
                       str_to_date('$endDate', '%d/%m/%y %H:%i:%s'),
                       $user
                       );
                ";

            $instance = MysqlConnection::getInstance();
            $instance->query($query);

            $session->set('reservation', Status::RESERVATION_OK);
            header ('Location: ./reservationList.php');
            die();
        }

        public function getAllReservations() :array {
            $query  = "SELECT
                rooms.room_id, rooms.name, rooms.floor, 
                reservations.reservation_id, reservations.firstname, reservations.lastname,
                reservations.email, reservations.start_date, reservations.end_date, reservations.user_id
                FROM rooms LEFT JOIN reservations ON rooms.room_id = reservations.room_id 
                WHERE rooms.room_id=reservations.room_id";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            $array = [];
            foreach ($result as $r) {
                $room = new RoomModel ($r['room_id'], $r['name'], $r['floor']);
                $userRepo = new UserRepository();
                $user = $userRepo->getUserById($r['user_id']);

                $array[] = new ReservationModel(
                    $r['reservation_id'],
                    $room,
                    $r['firstname'],
                    $r['lastname'],
                    $r['email'],
                    DateTime::createFromFormat("Y-m-d H:i:s", $r['start_date']),
                    DateTime::createFromFormat("Y-m-d H:i:s", $r['end_date']),
                    $user
                );
            }

            return $array;
        }

        public function getReservationByUserId (string $userId) :array {
            $query  = "SELECT
                rooms.room_id, rooms.name, rooms.floor,
                reservations.reservation_id, reservations.firstname, reservations.lastname,
                reservations.email, reservations.start_date, reservations.end_date, reservations.user_id
                FROM rooms LEFT JOIN reservations ON rooms.room_id = reservations.room_id
                WHERE rooms.room_id = reservations.room_id AND reservations.user_id = ".$userId.";";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            $array = [];
            foreach ($result as $r) {
                $room = new RoomModel ($r['room_id'], $r['name'], $r['floor']);
                $userRepo = new UserRepository();
                $user = $userRepo->getUserById($r['user_id']);

                $array[] = new ReservationModel(
                    $r['reservation_id'],
                    $room,
                    $r['firstname'],
                    $r['lastname'],
                    $r['email'],
                    DateTime::createFromFormat("Y-m-d H:i:s", $r['start_date']),
                    DateTime::createFromFormat("Y-m-d H:i:s", $r['end_date']),
                    $user
                );
            }

            return $array;
        }

        public function deleteReservation (string $reservationId) :void {
            $instance = MysqlConnection::getInstance();
            $session = Session::getInstance();

            $query = "DELETE FROM reservations WHERE reservation_id=$reservationId";
            if ($instance->query($query)) {
                $session->set('reservation', Status::RESERVATION_DELETE_OK);
            } else {
                $session->set('reservation', Status::RESERVATION_DELETE_ERROR);
            }
            header ('Location: ./reservationList.php');
            die();
        }

        private function checkRoomAvailability (string $roomId, DateTime $startDate, DateTime $endDate) :bool {
            $startDate2  = $startDate->format('Y-m-d H:i:s');
            $endDate2    = $endDate->format('Y-m-d H:i:s');
            $query  = "SELECT * FROM reservations 
                        WHERE room_id=$roomId 
                        AND ((start_date BETWEEN '$startDate2' AND '$endDate2') 
                                 OR (end_date BETWEEN '$startDate2' AND '$endDate2'))";

            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            if (count($result) < 1) {
                return true;
            }
            return false;
        }
    }