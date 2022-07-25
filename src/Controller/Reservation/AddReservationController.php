<?php

namespace Controller\Reservation;

use Reservation\Service\ReservationService;

class AddReservationController {

    public function request() :void {
        if (isset($_POST['roomId']) &&
            isset($_POST['firstName']) &&
            isset($_POST['lastName']) &&
            isset($_POST['email']) &&
            isset($_POST['startDate']) &&
            isset($_POST['endDate'])
        )
        {
            $service = new ReservationService();
            if ($service->addReservation()) {
                header ('Location: ./reservationList.php');
            } else {
                $path = 'Location: ./reservation.php?roomId='.$_POST['roomId'].'&name='.$_POST['roomName'];
                header ($path);
            }
            die();
        }
    }
}