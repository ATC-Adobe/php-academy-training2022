<?php

namespace Controllers\Reservation;

use Factory\ReservationsFactory;
use Factory\ReservationCommand;
use Reservation\ReservationRepository;
use Session\Session;

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
            'startHour' => date("H:i", (strtotime($_POST['startHour']))),
            'endHour' => date("H:i", (strtotime($_POST['endHour']))),
            'dataType' => $_POST['dataType']
        ];

        $roomId = intval($_POST['roomId']);
        $startDay = date("Y-m-d", (strtotime($_POST['startDay'])));
        $startHour = date("H:i", (strtotime($_POST['startHour'])));
        $endHour = date("H:i", (strtotime($_POST['endHour'])));
        $dataType = $_POST['dataType'];

        $repository = new ReservationRepository();
        $reservatedRooms = $repository->checkReservatedRooms($roomId, $startDay, $startHour, $endHour);

        if ($reservatedRooms === 'true') {
            $reservationsFactory = new ReservationsFactory($dataType);
            $object = $reservationsFactory->getReservationType();

            $reservationCommand = new ReservationCommand($dataReservation, $object);
            $reservationCommand->makeReservation();
        } else {
            $value = 'roomsCollision';
            $session = new Session();
            $session->set($value);
        }
    }
}
