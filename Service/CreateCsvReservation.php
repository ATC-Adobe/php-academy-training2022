<?php

namespace Service;

use SplFileObject;

class CreateCsvReservation implements ReservationStrategy
{

    public function createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $reservation = new SplFileObject((new ApplicationService())->getCsvReservationUrl(), 'a');
        $rows = (new ApplicationService())->getRows();
        $reservationId = $rows;
        $reservation->fputcsv([$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate]);
    }
}