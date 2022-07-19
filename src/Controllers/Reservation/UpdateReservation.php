<?php

namespace Controllers\Reservation;

use Reservation\ReservationRepository;
use Reservation\ReservationService;

class UpdateReservation
{
    public function editReservation(): void
    {
        $editReservation = new ReservationRepository();
        $editReservation->getReservationById();
    }

    public function updateReservation(): void
    {
        $updateReservation = [
            'roomId' => intval($_POST['roomId']),
            'roomNumber' => intval($_POST['roomNumber']),
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'startDay' => date("Y-m-d", (strtotime($_POST['startDay']))),
            'endDay' => date("Y-m-d", (strtotime($_POST['endDay']))),
            'startHour' => ($_POST['startHour']),
            'endHour' => $_POST['endHour'],
            'dataType' => $_POST['dataType']
        ];

        $reservationService = new ReservationService();
        $reservationService->updateReservation($updateReservation);
    }
}