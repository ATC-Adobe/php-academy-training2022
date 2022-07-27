<?php

namespace App\Api;

use App\Controller\ReservationController;
use App\Model\Reservation;
use App\Service\AuthenticatorService;
use App\Service\ReservationService;

/**
 * Created for testing, because instant echo in ApiController couldn't be tested
 */
class ApiExecJson
{
    public function listReservations($reservationService = new ReservationService())
    {
        return ($reservationService)->readReservations(true);
    }
    public function listActiveReservations($reservationService = new ReservationService()) {
        $reservations = ($reservationService)->readReservations(true);
        $results = [];
        foreach ($reservations as $reservation) {
            if(strtotime($reservation->start_date) > time() || strtotime($reservation->end_date) > time()) {
                $results[]= $reservation;
            }
        }
        return $results;
    }
    public function listUsersReservations(int|string $id, $service = new ReservationService()) {
        if(!$id) {
            http_response_code(400);
            echo json_encode(["error" => "no user id specified"]);
        }
        return $service->findUsersReservations($id);
    }
    public function addReservation($reservationService = new ReservationService()) {
        $reservation = new Reservation();
        $password = htmlentities($_POST["password"]);
        $email = htmlentities($_POST["email"]);

        $auth = new AuthenticatorService();
        $user = $auth->login($email, $password);
        if(!$user) {
            http_response_code(401);
            return ["error" => "You are not logged in"];
        }

        $reservation->room_id = htmlentities($_POST['room_id']);
        $reservation->start_date = htmlentities($_POST['start_date']);
        $reservation->end_date = htmlentities($_POST['end_date']);
        $reservation->user_id = $user->id;
        ReservationController::formatDates($reservation);

        if (!$reservationService->checkEndIsAfterStart($reservation->start_date, $reservation->end_date)) {
            http_response_code(400);
            return ["error" => "start date is after end date"];
        }

        if (!$reservationService->checkReservationCollision($reservation)) {
            http_response_code(409);
            return ["error" => "already occupied"];
        }

        if (!$reservationService->addReservation($reservation)) {
            http_response_code(500);
            return ["error" => "something went wrong!"];
        }
        return ["msg" => "success"];
    }
}