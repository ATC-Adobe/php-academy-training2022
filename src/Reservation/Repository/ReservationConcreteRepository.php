<?php

namespace Reservation\Repository;

use Reservation\Model\ReservationModel;
use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;
use System\Database\MySqlConnection;
use System\File\IFileWriter;

class ReservationConcreteRepository {

    public function __construct() { }

    public function getReservationById(int $id) : ?ReservationModel {

        $res =
            MySqlConnection::getInstance()
            ->query("SELECT * FROM Reservations WHERE id = '$id';")
            ->fetchAll();

        if(count($res) == 0) {
            return null;
        }

        $res = $res[0];

        $room = (new RoomConcreteRepository())
                ->getRoomById($res['room_id']);

        if($room === null) {
            return null;
        }

        return new ReservationModel(
            $res['id'],
            \DateTime::createFromFormat("Y-m-d H:i:s", $res['from_date']),
            \DateTime::createFromFormat("Y-m-d H:i:s", $res['to_date']),
            $res['name'],
            $res['email'],
            $res['surname'],
            $room
        );
    }

    public function getAllReservations() : array {
        $res =
            MySqlConnection::getInstance()
            ->query("SELECT *, 
                            Reservations.name AS name,
                            Rooms.id AS room_id, 
                            Rooms.name AS room_name, 
                            Rooms.floor AS floor
                            FROM Reservations JOIN Rooms ON Rooms.id = Reservations.room_id;")
            ->fetchAll();

        $arr = [];

        //$roomRepository = new RoomConcreteRepository();

        foreach ($res as $entry) {
            //$room = $roomRepository
                //->getRoomById($entry['room_id']);

            /*if($room === null) {
                continue;
            }*/

            $room = new RoomModel(
                $entry['room_id'],
                $entry['room_name'],
                $entry['floor'],
            );

            $arr[] = new ReservationModel(
                $entry['id'],
                \DateTime::createFromFormat("Y-m-d H:i:s", $entry['from_date']),
                \DateTime::createFromFormat("Y-m-d H:i:s", $entry['to_date']),
                $entry['name'],
                $entry['email'],
                $entry['surname'],
                $room
            );
        }

        return $arr;
    }

    public function addReservation(
        ReservationModel $reservation,
    ) : void {
        $surname =  $reservation->getSurname();
        $email =    $reservation->getEmail();
        $name =     $reservation->getName();
        $roomId =   $reservation->getRoom()->getId();
        $from =     $reservation->getFrom()->format('d/m/y H:i:s');
        $to =       $reservation->getTo()->format(  'd/m/y H:i:s');

        MySqlConnection::getInstance()
            ->query("INSERT INTO Reservations 
                    (name, surname, email, room_id, from_date, to_date) 
                    VALUES
                        (
                         '$name',
                         '$surname',
                         '$email',
                         '$roomId',
                         STR_TO_DATE('$from','%d/%m/%y %H:%i:%s'),
                         STR_TO_DATE('$to',  '%d/%m/%y %H:%i:%s')
                        );"
            );

    }

    public function checkForTimeCollisions(
        int $roomId,
        \DateTime $from,
        \DateTime $to
    ) : bool {

        $res =
            MySqlConnection::getInstance()->query(
            "SELECT * FROM Reservations 
                        WHERE room_id = '".$roomId."'
                        AND   from_date <= STR_TO_DATE('".$to->format('d/m/y H:i:s')."','%d/%m/%y %H:%i:%s')
                        AND   to_date   >= STR_TO_DATE('".$from->format('d/m/y H:i:s')."','%d/%m/%y %H:%i:%s');
               ")->fetchAll();
        return count( $res ) == 0;
    }

}