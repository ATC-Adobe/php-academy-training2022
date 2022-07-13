<?php

namespace System\File\Json;

use Reservation\Model\ReservationModel;
use System\File\IFileWriter;

class JsonFileWriter implements IFileWriter {

    public function writeLine(ReservationModel $reservation): bool {
        $file = json_decode(
            file_get_contents("reservations/reservations.json"),
            true
        );

        $id =       $reservation->getId();
        $surname =  $reservation->getSurname();
        $email =    $reservation->getEmail();
        $name =     $reservation->getName();
        $roomId =   $reservation->getRoom()->getId();
        $from =     $reservation->getFrom()->format('d/m/y H:i:s');
        $to =       $reservation->getTo()->format(  'd/m/y H:i:s');

        $file['root'][] =
            [
                "id" =>         $id,
                "room_id" =>    $roomId,
                "name" =>       $name,
                "surname" =>    $surname,
                "email" =>      $email,
                "from" =>       $from,
                "to" =>         $to,
            ];

        file_put_contents(
            "reservations/reservations.json",
            json_encode($file, JSON_PRETTY_PRINT)
            );

        return true;
    }

    public function closeStream(): void {
    }
}