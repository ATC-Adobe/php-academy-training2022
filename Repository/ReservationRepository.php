<?php

namespace Repository;

use Model\Reservation;
use Service\ApplicationService;
use Service\Session;
use System\Database\Connection;

class ReservationRepository extends Reservation
{
    public function getAllReservations(Connection $dbConnection)
    {
        $reservations = $dbConnection->query("SELECT * FROM reservations ORDER BY reservation_id ASC")->fetchAll();
        return $reservations;
    }

    public function getAllReservationsById(Connection $dbConnection)
    {
        $userId = $_SESSION['userId'];
        $reservations = $dbConnection->query("SELECT * FROM reservations WHERE id_user = '$userId'");
        return $reservations;
    }

    public function destroyReservation(Connection $dbConnection):void
    {
        $reservationId = $_GET['reservation_id'];
        $dbConnection->query(
            "DELETE FROM reservations WHERE reservation_id='$reservationId'"
        );
        $sessionMsg = new Session();
        $sessionMsg->sessionMessage('reservationDeleted');
        (new ApplicationService())->getReservationListHeader();
    }
}