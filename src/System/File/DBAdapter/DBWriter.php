<?php

namespace System\File\DBAdapter;

use Reservation\Model\ReservationModel;
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
}