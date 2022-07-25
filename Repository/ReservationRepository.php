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
        $reservations = $dbConnection->query(
            "SELECT reservations.reservation_id, reservations.room_id, reservations.id_user, reservations.firstname,
             reservations.lastname, reservations.email, reservations.start_date, reservations.end_date,
             rooms.name FROM reservations AS reservations JOIN rooms ON rooms.room_id = reservations.room_id"
        )->fetchAll();
        return $reservations;
    }

    public function getAllReservationsById(Connection $dbConnection)
    {
        $userId = $_SESSION['userId'];
        $reservations = $dbConnection->query("SELECT * FROM reservations WHERE id_user = '$userId'");
        return $reservations;
    }

    public function destroyReservation(Connection $dbConnection): void
    {
        $reservationId = $_GET['reservation_id'];
        $dbConnection->query(
            "DELETE FROM reservations WHERE reservation_id='$reservationId'"
        );

    }
}