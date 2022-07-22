<?php

namespace Service;

use DOMDocument;

class CreateXmlReservation implements ReservationStrategy
{
    public function createReservation($roomId,$userId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $xml = new DomDocument('1.0');
        $xml->formatOutput = true;
        $reservations = $xml->createElement("reservations");
        $xml->appendChild($reservations);
        $reservation = $xml->createElement("reservation");
        $reservations->appendChild($reservation);
        $roomIdCreate = $xml->createElement("room_id", $roomId);
        $reservation->appendChild($roomIdCreate);
        $userIdCreate = $xml->createElement("room_id", $userId);
        $reservation->appendChild($userIdCreate);
        $firstNameCreate = $xml->createElement("first_name", $firstName);
        $reservation->appendChild($firstNameCreate);
        $lastNameCreate = $xml->createElement("last_name", $lastName);
        $reservation->appendChild($lastNameCreate);
        $emailCreate = $xml->createElement("email", $email);
        $reservation->appendChild($emailCreate);
        $startDateCreate = $xml->createElement("start_date", $startDate);
        $reservation->appendChild($startDateCreate);
        $endDateCreate = $xml->createElement("end_date", $endDate);
        $reservation->appendChild($endDateCreate);
        $xml->save(((new ApplicationService())->getXmlReservationUrl()));
    }
}