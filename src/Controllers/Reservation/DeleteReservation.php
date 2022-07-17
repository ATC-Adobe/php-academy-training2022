<?php

namespace Controllers\Reservation;

use Reservation\ReservationRepository;

class DeleteReservation
{

    public function deleteReservation()
    {
        $deleteRoom = new ReservationRepository();
        $deleteRoom->deleteReservation();
    }
}