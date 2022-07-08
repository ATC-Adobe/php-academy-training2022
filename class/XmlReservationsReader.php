<?php
require_once "const/constants.php";
require_once "class/ReservationsReaderInterface.php";

// The class XmlReservationsReader is used to load data from the xml file
class XmlReservationsReader implements ReservationsReaderInterface
{
    private $xmlFile;

    public function __construct()
    {
        $this->xmlFile = simplexml_load_file(XML_FILE);
    }

    public function readReservations()
    {
        $reservation = [];
        foreach ($this->xmlFile->reservation as $reservation) {

            $reservations [] = [
                'roomId' => $reservation->roomId,
                'firstName' => $reservation->firstName,
                'lastName' => $reservation->lastName,
                'email' => $reservation->email,
                'startDay' => $reservation->startDay,
                'endDay' => $reservation->endDay,
                'startHour' => $reservation->startHour,
                'endHour' => $reservation->endHour];
        }
        return $reservations;
    }
}