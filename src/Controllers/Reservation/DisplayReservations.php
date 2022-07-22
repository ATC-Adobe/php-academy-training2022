<?php

namespace Controllers\Reservation;

use Reservation\ReservationRepository;

class DisplayReservations
{
    public function displayReservations(): bool|array
    {
        $displayReservations = new ReservationRepository();
        return $displayReservations->getReservationsWithRooms();
    }

    public function displayMyReservations($id): bool|array
    {
        $displayReservations = new ReservationRepository();
        return $displayReservations->getMyReservations($id);
    }
}