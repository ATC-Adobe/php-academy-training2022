<?php

namespace Reservation;

use Factory\IReservation;

class ReservationXml implements IReservation
{
    private object $xml;

    public function __construct()
    {
        $this->xml = simplexml_load_file(XML_FILE);
    }

    public function createReservation($dataReservation)
    {
        $roomNumber = $dataReservation['roomNumber'];
        $firstName = $dataReservation['firstName'];
        $lastName = $dataReservation['lastName'];
        $email = $dataReservation['email'];
        $startDay = $dataReservation['startDay'];
        $endDay = $dataReservation['endDay'];
        $startHour = $dataReservation['startHour'];
        $endHour = $dataReservation['endHour'];

        $reservation = $this->xml->addChild('reservation');
        $reservation->addChild('roomNUmber', $roomNumber);
        $reservation->addChild('firstName', $firstName);
        $reservation->addChild('lastName', $lastName);
        $reservation->addChild('email', $email);
        $reservation->addChild('startDay', $startDay);
        $reservation->addChild('endDay', $endDay);
        $reservation->addChild('startHour', $startHour);
        $reservation->addChild('endHour', $endHour);

        $this->xml->saveXML(XML_FILE);
    }
}