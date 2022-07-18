<?php

    namespace Reservation\Repository;
    use DateTime;
    use Room\Model\RoomModel;
    use Reservation\Model\ReservationModel;
    use System\Database\MysqlConnection;

    class ReservationRepository {
        public function addReservation (ReservationModel $reservation) :void {
            $roomId     = $reservation->getRoom()->getId();
            $firstName  = $reservation->getFirstName();
            $lastName   = $reservation->getLastName();
            $email      = $reservation->getEmail();
            $startDate  = $reservation->getStartDate()->format('d/m/y H:i:s');
            $endDate    = $reservation->getEndDate()->format('d/m/y H:i:s');

            $query = "INSERT INTO reservations(room_id, firstname, lastname, email, start_date, end_date)
                VALUES($roomId,
                       '$firstName', 
                       '$lastName', 
                       '$email', 
                       str_to_date(\"$startDate\", \"%d/%m/%y %H:%i:%s\"),
                       str_to_date(\"$endDate\", \"%d/%m/%y %H:%i:%s\")
                       );
                ";
            $instance = MysqlConnection::getInstance();
            $instance->query($query);
        }

        public function getAllReservations() :array {
            $query  = "SELECT
                rooms.room_id, rooms.name, rooms.floor, 
                reservations.reservation_id, reservations.firstname, reservations.lastname,
                reservations.email, reservations.start_date, reservations.end_date
                FROM rooms LEFT JOIN reservations ON rooms.room_id = reservations.room_id 
                WHERE rooms.room_id=reservations.room_id";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            $array = [];
            foreach ($result as $r) {
                $room = new RoomModel ($r['room_id'], $r['name'], $r['floor']);

                $array[] = new ReservationModel(
                    $r['reservation_id'],
                    $room,
                    $r['firstname'],
                    $r['lastname'],
                    $r['email'],
                    DateTime::createFromFormat("Y-m-d H:i:s", $r['start_date']),
                    DateTime::createFromFormat("Y-m-d H:i:s", $r['end_date'])
                );
            }

            return $array;
        }

        public function deleteReservation (string $reservationId) :bool {
            $instance = MysqlConnection::getInstance();
            $query = "DELETE FROM reservations WHERE reservation_id=$reservationId";
            if ($instance->query($query)) {
                return true;
            } else {
                return false;
            }
        }
    }