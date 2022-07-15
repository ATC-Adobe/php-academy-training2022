<?php

declare(strict_types=1);

namespace Controllers;

use Reservation\ReservationRepository;

class DisplayReservations
{
    public function displayReservations()
    {
        $displayReservations = new ReservationRepository();
        return $displayReservations->getReservationsWithRooms();
    }
}