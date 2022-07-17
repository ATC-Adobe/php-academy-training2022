<?php

namespace Controllers\Reservation;

use Reservation\ReservationRepository;

class DisplayReservations
{
    public function displayReservations()
    {
        $displayReservations = new ReservationRepository();
        return $displayReservations->getReservationsWithRooms();
    }
}