<?php

namespace Reservation;

use Factory\IReservation;

class ReservationJson implements IReservation
{

    private $json;

    public function __construct()
    {
        $this->json = file_get_contents(JSON_FILE, true);
    }

    public function createReservation(array $dataReservation)
    {
        $roomNumber = $dataReservation['roomNumber'];
        $firstName = $dataReservation['firstName'];
        $lastName = $dataReservation['lastName'];
        $email = $dataReservation['email'];
        $startDay = $dataReservation['startDay'];
        $endDay = $dataReservation['endDay'];
        $startHour = $dataReservation['startHour'];
        $endHour = $dataReservation['endHour'];

        $formData = [
            'roomNumber' => $roomNumber,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'startDay' => $startDay,
            'endDay' => $endDay,
            'startHour' => $startHour,
            'endHour' => $endHour
        ];

        $jsonDecode = json_decode($this->json);
        $jsonDecode[] = [$formData];
        $jsonEncode = json_encode($jsonDecode);
        $this->json = file_put_contents(JSON_FILE, $jsonEncode);
    }
}