<?php
require_once "const/constants.php";
require_once "class/ReservationServiceInterface.php";

// The class CsvReservationService is used to save data from the form to a csv file

class CsvReservationService
{
    private $spl;

    public function __construct()
    {
        $this->spl = new SplFileObject(CSV_FILE, 'a');
    }

    public function createReservation($id, $firstName, $lastName, $email, $startDay, $endDay, $startHour, $endHour)
    {
        $this->spl->fputcsv([$id, $firstName, $lastName, $email, $startDay, $endDay, $startHour, $endHour]);
    }
}