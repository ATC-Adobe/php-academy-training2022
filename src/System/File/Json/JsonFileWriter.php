<?php

namespace System\File\Json;

use Model\Reservation\Model\ReservationModel;
use System\File\IFileWriter;

class JsonFileWriter implements IFileWriter {

    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function writeLine(ReservationModel $reservation): bool {
        $file = json_decode(
            file_get_contents($this->filename),
            true
        );

        $id =       $reservation->getId();
        $surname =  $reservation->getUser()->getSurname();
        $email =    $reservation->getUser()->getEmail();
        $name =     $reservation->getUser()->getName();
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
            $this->filename,
            json_encode($file, JSON_PRETTY_PRINT)
            );

        return true;
    }

    public function closeStream(): void {
    }
}