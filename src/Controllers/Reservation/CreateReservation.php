<?php

namespace Controllers\Reservation;

use Factory\ReservationsFactory;
use Factory\ReservationCommand;
use Reservation\ReservationRepository;

class CreateReservation
{
    public function getDataFromForm(): void
    {
        $dataReservation = [
            'roomId' => intval($_POST['roomId']),
            'roomNumber' => intval($_POST['roomNumber']),
            'userId' => intval($_POST['userId']),
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'startDay' => date("Y-m-d", (strtotime($_POST['startDay']))),
            'endDay' => date("Y-m-d", (strtotime($_POST['endDay']))),
            'startHour' => $_POST['startHour'],
            'endHour' => $_POST['endHour'],
            'dataType' => $_POST['dataType']
        ];

        $startDay = date("Y-m-d", (strtotime($_POST['startDay'])));
        $startHour = $_POST['startHour'];

        $dataType = $_POST['dataType'];

        $repository = new ReservationRepository();
        $reservatedRooms = $repository->checkReservatedRooms($startDay, $startHour);

        if ($reservatedRooms === 'true') {
            $reservationsFactory = new ReservationsFactory($dataType);
            $object = $reservationsFactory->getReservationType();

            $reservationCommand = new ReservationCommand($dataReservation, $object);
            $reservationCommand->makeReservation();
        } else {
            header('Location:registration.php?roomerror');
        }
    }
}
