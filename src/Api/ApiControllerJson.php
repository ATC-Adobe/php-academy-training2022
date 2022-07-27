<?php

namespace App\Api;
use App\Service\ReservationService;

class ApiControllerJson
{
    public function __construct()
    {
//        can't be here unless lazy router will be implemented
//        header('Content-Type: application/json; charset=utf-8');
    }
    /**
     * echo reservations with associated users and rooms
     */
    public function listReservations($reservationService = new ReservationService()): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode((new ApiExecJson())->listReservations($reservationService));
    }
    /**
     * echo reservations with associated users and rooms
     */
    public function listActiveReservations($reservationService = new ReservationService()): void {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode((new ApiExecJson())->listActiveReservations($reservationService));
    }
    public function listUsersReservations($service = new ReservationService()): void {
        header('Content-Type: application/json; charset=utf-8');
        $id = (int)htmlentities($_GET["user_id"]);
        echo json_encode((new ApiExecJson())->listUsersReservations($id, $service));
    }
    public function addReservation($reservationService = new ReservationService()): void {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode((new ApiExecJson())->addReservation($reservationService));
    }
}