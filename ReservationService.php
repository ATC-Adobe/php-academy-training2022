<?php

class ReservationService
{
    private $reservation;

    public function __construct()
    {
        $this->reservation = new SplFileObject('data/reservations.csv', 'a');
    }

    public function addReservation($room_id, $firstname, $lastname, $email, $start_date, $end_date)
    {
        $rows = $this->getRows();
        $reservation_id = $rows;
        $this->reservation->fputcsv([$reservation_id, $room_id, $firstname, $lastname, $email, $start_date, $end_date]);
    }

    public function getRows(): int
    {
        $rows = count(file("data/reservations.csv"));
        if ($rows > 1) {
            $rows = ($rows - 1) + 1;
        }
        return $rows;
    }
}