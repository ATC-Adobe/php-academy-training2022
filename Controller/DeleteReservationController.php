<?php

namespace Controller;

use Repository\ReservationRepository;
use System\Database\Connection;

class DeleteReservationController
{
    public function deleteReservation(Connection $dbConnection): void
    {
        if (isset($_GET['reservation_id'])) {
            (new ReservationRepository())->destroyReservation($dbConnection);
        }
    }
}