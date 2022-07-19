<?php

namespace Controllers\Reservation;

use Reservation\ReservationRepository;

class DeleteReservation
{

    public function deleteReservation(): void
    {
        $deleteRoom = new ReservationRepository();
        $deleteRoom->deleteReservation();
    }
}