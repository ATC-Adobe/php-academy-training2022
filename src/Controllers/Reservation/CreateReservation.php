<?php

namespace Controllers\Reservation;

use Factory\ReservationsFactory;
use Factory\ReservationCommand;

class CreateReservation
{
    public function getDataFromForm()
    {
        $dataReservation = [
            'roomId' => $_POST['roomId'],
            'roomNumber' => $_POST['roomNumber'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'startDay' => $_POST['startDay'],
            'endDay' => $_POST['endDay'],
            'startHour' => $_POST['startHour'],
            'endHour' => $_POST['endHour'],
            'dataType' => $_POST['dataType']
        ];

        $dataType = $_POST['dataType'];

        $reservationsFactory = new ReservationsFactory($dataType);
        $object = $reservationsFactory->getReservationType();

        $reservationCommand = new ReservationCommand($dataReservation, $object);
        $reservationCommand->makeReservation();
    }
}