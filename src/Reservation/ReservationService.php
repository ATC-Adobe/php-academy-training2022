<?php

namespace Reservation;

include("../../autoloading.php");
use Reservation\ReservationRepository;
use Reservation\Reservation;

class ReservationService
{
    public function createResrvation()
    {
        $newReserve = new Reservation;
        #$newReserve->setReservationId($_POST['reservation_id']);
        $newReserve->setRoomId($_POST['room_id']);
        $newReserve->setFirstname($_POST['firstname']);
        $newReserve->setLastname($_POST['lastname']);
        $newReserve->setEmail($_POST['email']);
        $newReserve->setStartDate($_POST['startdate']);
        $newReserve->setEndDate($_POST['enddate']);

        $addReservation = new ReservationRepository;
        $addReservation->addReservation($newReserve);
    }


}
