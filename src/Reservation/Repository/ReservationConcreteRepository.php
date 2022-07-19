<?php

namespace Reservation\Repository;

use Reservation\Model\ReservationModel;
use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;
use System\Database\MySqlConnection;
use System\File\IFileWriter;
use User\Model\UserModel;

class ReservationConcreteRepository {

    /** Default constructor
     *
     */
    public function __construct() { }

    /**
     * Deletes reservation with given id
     *
     * @param int $id
     * @return void
     */
    public function deleteReservationById(int $id) : void {

        MySqlConnection::getInstance()
            ->query("DELETE FROM Reservations WHERE id = '$id';");
    }

    /**
     * Fetches all active reservations in an array
     *
     * @return array<ReservationModel>
     */
    private function getAllReservationsWithConstraint(string $constr = '') : array {
        $res =
            MySqlConnection::getInstance()
            ->query("SELECT *, 
                            Users.name AS name,
                            Reservations.id AS id,
                            Rooms.id AS room_id, 
                            Rooms.name AS room_name, 
                            Rooms.floor AS floor
                            FROM Reservations 
                            JOIN Rooms ON Rooms.id = Reservations.room_id
                            JOIN Users ON Users.id = Reservations.user_id
                            $constr;")
            ->fetchAll();

        $arr = [];

        foreach ($res as $entry) {

            $room = new RoomModel(
                $entry['room_id'],
                $entry['room_name'],
                $entry['floor'],
            );

            $user = new UserModel(
                $entry['user_id'],
                $entry['name'],
                $entry['surname'],
                $entry['email'],
                $entry['nickname'],
                $entry['salt'],
                $entry['password'],
            );

            $arr[] = new ReservationModel(
                $entry['id'],
                \DateTime::createFromFormat("Y-m-d H:i:s", $entry['time_from']),
                \DateTime::createFromFormat("Y-m-d H:i:s", $entry['time_to']),
                $user,
                $room,
            );
        }

        return $arr;
    }

    public function getAllReservations() : array {

        return $this->getAllReservationsWithConstraint();
    }

    public function getReservationById(int $id) : ?ReservationModel {

        $res = $this->getAllReservationsWithConstraint("WHERE id = '$id'");

        if(count($res) == 0) {
            return null;
        }

        return $res[0];
    }

    public function getReservationsByUserId(int $id) : array {

        return $this->getAllReservationsWithConstraint("WHERE user_id = '$id'");
    }

    /**
     * Adds new reservation to DB
     *
     * @param ReservationModel $reservation
     * @return void
     */
    public function addReservation(
        ReservationModel $reservation,
    ) : void {
        $userId =   $reservation->getUser()->getId();
        $roomId =   $reservation->getRoom()->getId();
        $from =     $reservation->getFrom()->format('d/m/y H:i:s');
        $to =       $reservation->getTo()->format(  'd/m/y H:i:s');

        MySqlConnection::getInstance()
            ->query("INSERT INTO Reservations 
                    (user_id, room_id, time_from, time_to) 
                    VALUES
                        (
                         '$userId',
                         '$roomId',
                         STR_TO_DATE('$from','%d/%m/%y %H:%i:%s'),
                         STR_TO_DATE('$to',  '%d/%m/%y %H:%i:%s')
                        );"
            );

    }

    /**
     * Checks whether or nor room is reserved during given time period
     *
     * @param int $roomId
     * @param \DateTime $from
     * @param \DateTime $to
     * @return bool
     */
    public function checkForTimeCollisions(
        int $roomId,
        \DateTime $from,
        \DateTime $to
    ) : bool {

        $res =
            MySqlConnection::getInstance()->query(
            "SELECT * FROM Reservations 
                        WHERE room_id = '".$roomId."'
                        AND   time_from <= STR_TO_DATE('".$to->format('d/m/y H:i:s')."','%d/%m/%y %H:%i:%s')
                        AND   time_to   >= STR_TO_DATE('".$from->format('d/m/y H:i:s')."','%d/%m/%y %H:%i:%s');
               ")->fetchAll();
        return count( $res ) == 0;
    }

}