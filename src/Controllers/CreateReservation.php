<?php

declare(strict_types=1);

namespace Controllers;

use Reservation\ReservationService;

class CreateReservation
{
    public function createReservation()
    {
        $dataReservation = [
            'roomId' => $_POST['roomId'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'startDay' => $_POST['startDay'],
            'endDay' => $_POST['endDay'],
            'startHour' => $_POST['startHour'],
            'endHour' => $_POST['endHour']
        ];

        $reservationService = new ReservationService();
        $reservationService->createReservation($dataReservation);
    }
}