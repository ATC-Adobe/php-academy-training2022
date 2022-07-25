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

        private MysqlConnection $mysql;
        private Session $session;

        public function __construct () {
            $this->mysql = MysqlConnection::getInstance();
            $this->session  = Session::getInstance();
         }

        public function addReservation (ReservationModel $reservation) :bool {

            $roomId     = $reservation->getRoom()->getId();
            $roomName   = $reservation->getRoom()->getName();
            $firstName  = $reservation->getFirstName();
            $lastName   = $reservation->getLastName();
            $email      = $reservation->getEmail();
            $startDate  = $reservation->getStartDate();
            $endDate    = $reservation->getEndDate();
            $user       = $reservation->getUser()->getId();

            $currentDate = $this->getCurrentDate();

            if (!$this->isPastDate($startDate, $endDate, $currentDate)) {
                return false;
            }

            if (!$this->isDateCorrect($startDate, $endDate)) {
                return false;
            }

            if (!$this->checkRoomAvailability($roomId, $startDate, $endDate)) {
                return false;
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

            $this->mysql->query($query);

            $this->session->set('reservation', Status::RESERVATION_OK);
            return true;
        }

        public function getAllReservations() :array {
            $query  = "SELECT
                rooms.room_id, rooms.name, rooms.floor, 
                reservations.reservation_id, reservations.firstname, reservations.lastname,
                reservations.email, reservations.start_date, reservations.end_date, reservations.user_id
                FROM rooms LEFT JOIN reservations ON rooms.room_id = reservations.room_id 
                WHERE rooms.room_id=reservations.room_id";
            $result = $this->mysql->query($query)->fetchAll();

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
                    $this->createDate($r['start_date'], false),
                    $this->createDate($r['end_date'], false),
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
            $result = $this->mysql->query($query)->fetchAll();

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
                    $this->createDate($r['start_date'], false),
                    $this->createDate($r['end_date'], false),
                    $user
                );
            }

            return $array;
        }

        public function deleteReservation (string $reservationId) :void {

            $query = "DELETE FROM reservations WHERE reservation_id=$reservationId";
            if ($this->mysql->query($query)) {
                $this->session->set('reservation', Status::RESERVATION_DELETE_OK);
            } else {
                $this->session->set('reservation', Status::RESERVATION_DELETE_ERROR);
            }
            header ('Location: ./reservationList.php');
            die();
        }

        public function isPastDate (DateTime $startDate, DateTime $endDate, Datetime $currentDate) :bool {
            if ($startDate < $currentDate || $endDate < $currentDate) {
                $this->session->set('reservation', Status::RESERVATION_PAST_DATE);
                return false;
            }
            return true;
        }

        public function isDateCorrect (DateTime $startDate, DateTime $endDate) :bool {
            if ($startDate >= $endDate) {
                $this->session->set('reservation', Status::RESERVATION_INCORRECT_DATE);
                return false;
            }
            return true;
        }

        public function createDate (string $date, bool $datetimeInput) :DateTime {
            return match ($datetimeInput) {
                true    => DateTime::createFromFormat('Y-m-d\TH:i', $date),
                false   => DateTime::createFromFormat('Y-m-d H:i:s', $date),
                default => $date,
            };
        }

        public function getCurrentDate () :DateTime {
            return new DateTime("now", new \DateTimeZone('Europe/Warsaw'));
        }

        public function checkRoomAvailability (string $roomId, DateTime $startDate, DateTime $endDate) :bool {
            $startDate2  = $startDate->format('Y-m-d H:i:s');
            $endDate2    = $endDate->format('Y-m-d H:i:s');
            $query  = "SELECT * FROM reservations 
                        WHERE room_id=$roomId 
                        AND ((start_date BETWEEN '$startDate2' AND '$endDate2') 
                                 OR (end_date BETWEEN '$startDate2' AND '$endDate2'))";

            $result = $this->mysql->query($query)->fetchAll();

            if (count($result) < 1) {
                return true;
            }
            $this->session->set('reservation', Status::RESERVATION_ROOM_NOT_AVAILABLE);
            return false;
        }
    }