<?php

namespace App\Controller;

use App\Model\ReservationModel;
use App\Service\ReservationService;
use App\View\ReservationForm;
use App\View\ReservationList;

class ReservationController
{
    public function index(string $msg = "") {
        (new ReservationList())->render($msg);
    }
    public function store() {
        $reservationService = new ReservationService();
        $msg = "";
        $ok = true;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservation = new ReservationModel();
            $reservation->room_id = htmlentities($_POST['room_id']);
            $reservation->email = htmlentities($_POST['email']);
            $reservation->first_name = htmlentities($_POST['first_name']);
            $reservation->last_name = htmlentities($_POST['last_name']);


            $start = strtotime($_POST['start_date']);
            $end = strtotime($_POST['end_date']);

            $reservation->start_date = date("Y-m-d H:i:s", $start);
            $reservation->end_date = date("Y-m-d H:i:s", $end);

            if($end < $start) {
                $msg = "End date must be after the start date!";
                $ok = false;
            }
            if($ok && !$reservationService->checkReservationCollision($reservation)) {
                $msg = "Already occupied";
                $ok = false;
            }
            if($ok && ! $reservationService->addReservation($reservation)) {
                $msg = "Something went wrong! Try again";
                $ok = false;
            }
            if($ok) {
                $msg = "Successfully added reservation!";
            }

            $this->index($msg);
        } else {
            echo "Unknown Method!";
        }

    }
    public function create() {
        (new ReservationForm())->render();
    }
}