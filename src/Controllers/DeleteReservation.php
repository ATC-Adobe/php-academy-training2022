<?php

declare(strict_types=1);

namespace Controllers;

use Reservation\ReservationRepository;

class DeleteReservation
{

    public function deleteReservation()
    {
        $deleteRoom = new ReservationRepository();
        $deleteRoom->deleteReservation();
    }
}