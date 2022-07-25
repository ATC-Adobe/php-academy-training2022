<?php

namespace App\Api;
use App\Model\Reservation;
use App\Model\Session;
use App\Service\AuthenticatorService;
use App\Service\ReservationService;
use App\System\File\IOHandlerFactory;

class ApiControllerJson
{
    public function __construct()
    {
//        can't be here unless lazy router will be implemented
//        header('Content-Type: application/json; charset=utf-8');

    }


    /**
     * echo reservations with associated users and rooms
     * @return void
     */
    public function listReservations(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $reservations = (new ReservationService())->readReservations(true);
        echo json_encode($reservations);
    }
    /**
     * echo reservations with associated users and rooms
     * @return void
     */
    public function listActiveReservations(): void {
        header('Content-Type: application/json; charset=utf-8');
        $reservations = (new ReservationService())->readReservations(true);
        $results = [];
        foreach ($reservations as $reservation) {
            if(strtotime($reservation->start_date) > time() || strtotime($reservation->end_date) > time()) {
                $results[]= $reservation;
            }
        }
        echo json_encode($results);
    }
    public function listUsersReservations(): void {
        header('Content-Type: application/json; charset=utf-8');

        $id = htmlentities($_GET["user_id"]);
        if(!$id) {
            http_response_code(400);
            echo json_encode(["error" => "no user id specified"]);
        }
        $service = new ReservationService();
        $reservation = $service->findUsersReservations($id);
        echo json_encode($reservation);
    }
    public function addReservation(): void {
        header('Content-Type: application/json; charset=utf-8');
        $reservationService = new ReservationService();
        $reservation = new Reservation();
        $password = htmlentities($_POST["password"]);
        $email = htmlentities($_POST["email"]);

        $auth = new AuthenticatorService();
        $user = $auth->login($email, $password);
        if(!$user) {
            http_response_code(401);
            echo json_encode(["error" => "You are not logged in"]);
            return;
        }

        $reservation->room_id = htmlentities($_POST['room_id']);
        $reservation->start_date = htmlentities($_POST['start_date']);
        $reservation->end_date = htmlentities($_POST['end_date']);
        $reservation->user_id = $user->id;
        $this->formatDates($reservation);

        if (!$reservationService->checkEndIsAfterStart($reservation->start_date, $reservation->end_date)) {
            http_response_code(400);
            echo json_encode(["error" => "start date is after end date"]);
            return;
        }

        if (!$reservationService->checkReservationCollision($reservation)) {
            http_response_code(409);
            echo json_encode(["error" => "already occupied"]);
            return;
        }

        if (!$reservationService->addReservation($reservation)) {
            http_response_code(500);
            echo json_encode(["error" => "something went wrong!"]);
            return;
        }
        echo json_encode(["msg" => "success"]);
    }
    public function formatDates(Reservation $reservation): void
    {
        $reservation->start_date = date("Y-m-d H:i:s", strtotime($reservation->start_date));
        $reservation->end_date = date("Y-m-d H:i:s", strtotime($reservation->end_date));
    }

}