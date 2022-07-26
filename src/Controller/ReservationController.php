<?php

namespace App\Controller;

use App\Model\Reservation;
use App\Model\Session;
use App\Service\AuthenticatorService;
use App\Service\ReservationService;
use App\System\File\CsvHandler;
use App\System\File\JsonHandler;
use App\System\File\IOHandlerFactory;
use App\View\ReservationForm;
use App\View\ReservationList;
use App\View\ReservationUpdateForm;
use App\View\UserReservationList;

class ReservationController
{
    public function index(string $alertMsg ="",  string $type="danger"): void
    {
        $reservations = (new ReservationService())->readReservations(true);
        (new ReservationList($reservations, $alertMsg, $type))->render();
    }

    public function store(): void
    {
        (new AuthenticatorService())->isNotAuthRedirect();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Unknown Method!";
            return;
        }
            //based on $_POST[]
            $handler = IOHandlerFactory::create();
            $reservationService = new ReservationService($handler);

            //for hidden inputs if $this->create() is invoked ($_GET will be lost)
            Session::getInstance()->set("room_id", htmlentities($_POST["room_id"]));
            Session::getInstance()->set("room_name", htmlentities($_POST["room_name"]));

            $reservation = new Reservation();
            $reservation->room_id = htmlentities($_POST['room_id']);
            $reservation->start_date = htmlentities($_POST['start_date']);
            $reservation->end_date = htmlentities($_POST['end_date']);
            $reservation->user_id = Session::getInstance()->get("user_id");
            self::formatDates($reservation);

        if (!$reservationService->checkEndIsAfterStart($reservation->start_date, $reservation->end_date)) {
                 $this->create("End date must be after the start date!");
                    return;
            }

            if (!$reservationService->checkReservationCollision($reservation)) {
                $this->create("Already occupied!");
                return;
            }
            //delete info for inputs if it passed validation
        Session::getInstance()->flush(["room_id", "room_name"]);

        if (!$reservationService->addReservation($reservation)) {
            $this->index(alertMsg: "Something went wrong! Try again");
                return;
            }
        $this->index(alertMsg: "Successfully added reservation!", type: "success");
    }

    public function create(string $msg = ""): void
    {
        $name = $_GET["name"] ?? Session::getInstance()->get("room_name");
        $id = $_GET["id"] ?? Session::getInstance()->get("room_id");
        if(!$name || !$id) {
            $this->index(alertMsg: "Something went wrong! Try again");
        }
        (new AuthenticatorService())->isNotAuthRedirect();
        (new ReservationForm($name, $id))->render($msg);
    }

    public function delete(): void
    {
        (new AuthenticatorService())->isNotAuthRedirect();

        $reservationService = new ReservationService();
        $id = htmlentities($_POST["reservation_id"]);
        $reservation = $reservationService->findOne($id);

        $this->yourReservationGuard($reservation);

        $ok = $reservationService->deleteReservation($id);
        $msg = "";
        if (!$ok) {
            $msg = "Something went wrong!";
        } else {
            $msg = "Successfully deleted reservation!";
        }
        $this->index(alertMsg: $msg, type: $ok ? "success" : "danger");
    }
    public function edit(string $msg = ""): void
    {
        (new AuthenticatorService())->isNotAuthRedirect();
        $id = htmlentities($_GET["reservation_id"]);
        $service = new ReservationService();
        $reservation = $service->findOneWithRelations($id);
        (new ReservationUpdateForm($reservation))->render($msg);
    }
    public function update(): void
    {
        (new AuthenticatorService())->isNotAuthRedirect();
        $service = new ReservationService();
        $id = htmlentities($_POST["reservation_id"]);
        $reservation = $service->findOne($id);
        if(!$reservation) {
            $this->index(alertMsg: "Failed fetching reservation! Is id correct?");
            return;
        }
        $this->yourReservationGuard($reservation);

        $reservation->start_date = htmlentities($_POST["start_date"] ?? $reservation->start_date);
        $reservation->end_date = htmlentities($_POST["end_date"] ?? $reservation->end_date);
        $reservation->user_id = Session::getInstance()->get("user_id");

        self::formatDates($reservation);

        if (!$service->checkEndIsAfterStart($reservation->start_date, $reservation->end_date)) {
            $_GET["reservation_id"] = $_POST["reservation_id"];
            $this->edit("End date must be after the start date!");
            return;
        }

        if(!$service->checkReservationCollision($reservation)) {
            $_GET["reservation_id"] = $_POST["reservation_id"];
            $this->edit("Couldn't update reservation. It is already reserve");
            return;
        }
        $ok = $service->updateReservation($reservation);
        $msg = $ok ? "Successfully updated reservation" : "Something went wrong!";
        $this->index($msg, "success");
    }

    public function show(): void {
        (new AuthenticatorService())->isNotAuthRedirect();
        $user_id = (int)Session::getInstance()->get("user_id");
        $reservations = (new ReservationService())->findUsersReservations($user_id);
        (new UserReservationList($reservations))->render();
    }

    /**
     * @param Reservation $reservation
     * @return void
     */
    public static function formatDates(Reservation $reservation): void
    {
        $reservation->start_date = date("Y-m-d H:i:s", strtotime($reservation->start_date));
        $reservation->end_date = date("Y-m-d H:i:s", strtotime($reservation->end_date));
    }

    /**
     * @param Reservation $reservation
     * @return void
     */
    public function yourReservationGuard(Reservation $reservation): void
    {
        if ($reservation->user_id != Session::getInstance()->get("user_id")) {
            echo "Not your reservation!";
            exit();
        }
    }
}