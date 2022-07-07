<?php

// The class ReservationService is used to save data from the form to a csv file
class ReservationService
{
    private $spl;

    public function __construct()
    {
        $this->spl = new SplFileObject('reservations.csv', 'a');
    }

    public function createReservation($id, $firstname, $lastname, $email, $startday, $endday, $starthour, $endhour)
    {
        $this->spl->fputcsv([$id, $firstname, $lastname, $email, $startday, $endday, $starthour, $endhour]);
    }

}