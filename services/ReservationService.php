<?php

include_once 'services/ApplicationService.php';

class ReservationService
{
    private $reservation;

    public function __construct()
    {
        $this->reservation = new SplFileObject('data/reservations.csv', 'a');
    }

    public function addReservation($room_id, $firstname, $lastname, $email, $start_date, $end_date)
    {
        $rows = (new ApplicationService())->getRows();
        $reservation_id = $rows;
        $this->reservation->fputcsv([$reservation_id, $room_id, $firstname, $lastname, $email, $start_date, $end_date]);
        (new ApplicationService())->getReservationListHeader();
    }
}