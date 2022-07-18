<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Reservation\Repository\ReservationConcreteRepository;
use Router\Response;

class RemoveReservationController {
    public function __construct() {

    }

    /**
     * Function validates reservation removal request and redirects with proper message
     *
     * @return void
     */
    #[NoReturn] public function makeRequest() : void {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            unset($_POST['id']);

            (new ReservationConcreteRepository())
                ->deleteReservationById($id);

            if(__ROUTER) {
                (new Response())->goTo('/roomReservationListing?status=3');
            }
            else {
                header('Location: roomReservationListing.php?status=3');
                die();
            }
        }
        if(__ROUTER) {
            (new Response())->goTo('/roomReservationListing?status=4');
        }
        else {
            header('Location: roomReservationListing.php?status=4');
            die();
        }
    }
}