<?php

namespace System\File\DBAdapter;

use Reservation\Model\ReservationModel;
use Room\Model\RoomModel;
use System\Database\MySqlConnection;
use System\File\IFileWriter;

class DBWriter implements IFileWriter {
    public function writeLine(ReservationModel $reservation) : bool {
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

        return true;
    }

    public function closeStream() : void {
        // nothing to be done here
    }

    public function loadData(): void {
        //
    }

    public function getEntries(): array {
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

    public function saveChanges() : void {
    }
}