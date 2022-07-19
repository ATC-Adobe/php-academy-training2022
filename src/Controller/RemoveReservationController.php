<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Reservation\Repository\ReservationConcreteRepository;
use Router\Response;
use System\Status;

class RemoveReservationController {
    public function __construct() {

    }

    /**
     * Function validates reservation removal request and redirects with proper message
     *
     * @return void
     */
    #[NoReturn] public function makeRequest() : void {
        if(!isset($_POST['id'])) {
            (new Response())->goTo(
                '/roomReservationListing?status='
                        .Status::RESERVATION_REMOVE_ERROR
            );
        }

        $id = $_POST['id'];
        unset($_POST['id']);

        (new ReservationConcreteRepository())
            ->deleteReservationById($id);


        (new Response())->goTo(
            '/roomReservationListing?status='
                    .Status::RESERVATION_REMOVE_OK
        );
    }
}