<?php

namespace System\File\Xml;

use Reservation\Model\ReservationModel;
use System\File\IFileWriter;

class XmlFileWriter implements IFileWriter {

    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function writeLine(ReservationModel $reservation): bool {
        $id =       $reservation->getId();
        $surname =  $reservation->getUser()->getSurname();
        $email =    $reservation->getUser()->getEmail();
        $name =     $reservation->getUser()->getName();
        $roomId =   $reservation->getRoom()->getId();
        $from =     $reservation->getFrom()->format('d/m/y H:i:s');
        $to =       $reservation->getTo()->format(  'd/m/y H:i:s');

        $xml = simplexml_load_file($this->filename);

        $reservations = $xml->reservations;

        $reservation = $reservations->addChild('reservation');
        $reservation->addChild('id',        $id);
        $reservation->addChild('room_id',   $roomId);
        $reservation->addChild('name',      $name);
        $reservation->addChild('surname',   $surname);
        $reservation->addChild('email',     $email);
        $reservation->addChild('from',      $from);
        $reservation->addChild('to',        $to);

        $xml->saveXML($this->filename);


        return true;
    }

    public function closeStream(): void {

    }
}