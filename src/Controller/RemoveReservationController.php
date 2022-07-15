<?php

namespace Controller;

use Reservation\Repository\ReservationConcreteRepository;

class RemoveReservationController {
    public function __construct() {

    }

    public function makeRequest() : void {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            unset($_POST['id']);

            (new ReservationConcreteRepository())
                ->deleteReservationById($id);

            header('Location: roomReservationListing.php?status=3');
            die();
        }
        header('Location: roomReservationListing.php?status=4');
        die();
    }
}