<?php

namespace Reservation;

use Factory\IReservation;
use SplFileObject;

class ReservationCsv implements IReservation
{
    private object $spl;

    public function __construct()
    {
        $this->spl = new SplFileObject(CSV_FILE, 'a');
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

        $this->spl->fputcsv(
            [
                $roomNumber,
                $firstName,
                $lastName,
                $email,
                $startDay,
                $endDay,
                $startHour,
                $endHour
            ]
        );
    }
}