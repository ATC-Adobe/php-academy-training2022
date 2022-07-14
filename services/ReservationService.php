<?php

use System\Database\Connection;

include_once 'services/ApplicationService.php';
include_once 'db/Connection.php';

class ReservationService
{
    private $reservation;

    public function __construct()
    {
        $this->reservation = new SplFileObject((new ApplicationService())->getCsvReservationUrl(), 'a');
    }

    public function addCsvReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $rows = (new ApplicationService())->getRows();
        $reservationId = $rows;
        $this->reservation->fputcsv([$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate]);
        (new ApplicationService())->getReservationListHeader();
    }

}