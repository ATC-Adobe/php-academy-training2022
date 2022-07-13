<?php

namespace App\Controller;

use App\Model\Reservation;
use App\Service\ReservationService;
use App\System\File\CsvHandler;
use App\System\File\JsonHandler;
use App\System\File\IOHandlerFactory;
use App\View\ReservationForm;
use App\View\ReservationList;

class ReservationController
{
    public function index(string $msg = ""): void
    {
        (new ReservationList())->render($msg);
    }
    public function store(): void
    {

        $msg = "";
        $ok = true;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //based on $_POST[]
            $handler = IOHandlerFactory::create();
            $reservationService = new ReservationService($handler);

            $reservation = new Reservation();
            $reservation->room_id = htmlentities($_POST['room_id']);
            $reservation->email = htmlentities($_POST['email']);
            $reservation->first_name = htmlentities($_POST['first_name']);
            $reservation->last_name = htmlentities($_POST['last_name']);


            $start = strtotime(htmlentities($_POST['start_date']));
            $end = strtotime(htmlentities($_POST['end_date']));

            $reservation->start_date = date("Y-m-d H:i:s", $start);
            $reservation->end_date = date("Y-m-d H:i:s", $end);

            if($end < $start) {
                $msg = "End date must be after the start date!";
                $ok = false;
            }
            if($ok && !$reservationService->checkReservationCollision($reservation)) {
                $msg = "Already occupied!";
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
    public function create(): void
    {
        (new ReservationForm())->render();
    }
}