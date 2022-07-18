<?php

namespace Controller\Reservation;
use Reservation\Service\ReservationService;

class DeleteReservationController {
    public function request(): void {
        if (isset($_POST['id'])) {
            $service = new ReservationService();
            $service->deleteReservation();
            header ("Location: ./reservationList.php?reservationDelete=true");
            die();
        }
        header ("Location: ./reservationList.php?reservationDelete=false");
        die();
    }
}