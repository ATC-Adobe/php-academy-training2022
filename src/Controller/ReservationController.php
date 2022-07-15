<?php

namespace App\Controller;

use App\Model\Reservation;
use App\Service\ReservationService;
use App\System\File\CsvHandler;
use App\System\File\JsonHandler;
use App\System\File\IOHandlerFactory;
use App\View\ReservationForm;
use App\View\ReservationList;
use App\View\ReservationUpdateForm;

class ReservationController
{
    public function index(string $msg = ""): void
    {
        $reservations = (new ReservationService())->readReservations(true);
        (new ReservationList($reservations))->render($msg);
    }

    public function store(): void
    {
        $msg = "";
        $ok = true;
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Unknown Method!";
            return;
        }
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

            if ($end < $start) {
                 $this->index("End date must be after the start date!");
                    return;
            }
            if (!$reservationService->checkReservationCollision($reservation)) {
                $this->index("Already occupied!");
                return;
            }
            if (!$reservationService->addReservation($reservation)) {
                $this->index("Something went wrong! Try again");
                return;
            }

            $this->index("Successfully added reservation!");
    }

    public function create(): void
    {
        (new ReservationForm())->render();
    }

    public function delete(): void
    {
        $reservationService = new ReservationService();
        //TODO: authorize
        $id = $_POST["reservation_id"];
        $ok = $reservationService->deleteReservation($id);
        $msg = "";
        if (!$ok) {
            $msg = "Something went wrong!";
        } else {
            $msg = "Successfully deleted reservation!";
        }
        $this->index($msg);
    }
    public function edit(): void
    {
        $id = $_GET["reservation_id"];
        $service = new ReservationService();
        $reservation = $service->findOne($id);
        (new ReservationUpdateForm($reservation))->render();
    }
    public function update(): void
    {
        $service = new ReservationService();
        // TODO: authorize
        $id = $_POST["reservation_id"];
        $reservation = $service->findOne($id);
        $reservation->start_date = $_POST["start_date"] ?? $reservation->start_date;
        $reservation->end_date = $_POST["end_date"] ?? $reservation->end_date;
        if(!$service->checkReservationCollision($reservation)) {
            $this->index("Couldn't update reservation. It is already reserve");
            return;
        }
        $ok = $service->updateReservation($reservation);
        $msg = $ok ? "Successfully updated reservation" : "Something went wrong!";
        $this->index($msg);
    }
}