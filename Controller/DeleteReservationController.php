<?php

namespace Controller;

use Repository\ReservationRepository;
use Service\ApplicationService;
use Service\Session;
use System\Database\Connection;

class DeleteReservationController
{
    public function deleteReservation(Connection $dbConnection): void
    {
        if (isset($_GET['reservation_id'])) {
            (new ReservationRepository(
                'reservation_id',
                'id_user',
                'room_id',
                'firstname',
                'lastname',
                'email',
                'start_date',
                'end_date',
            ))->destroyReservation($dbConnection);
            $sessionMsg = new Session();
            $sessionMsg->sessionMessage('reservationDeleted');
            (new ApplicationService())->getReservationListHeader();
            exit();
        }
    }
}