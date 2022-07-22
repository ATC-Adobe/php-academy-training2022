<?php

namespace Controllers\Reservation;

use Reservation\ReservationRepository;
use Reservation\ReservationService;
use Session\Session;

class UpdateReservation
{
    public function editReservation($id)
    {
        $editReservation = new ReservationRepository();
        return $editReservation->getReservationById($id);
    }

    public function updateReservation(): void
    {
        $updateReservation = [
            'reservationId' => intval($_POST['reservationId']),
            'roomId' => intval($_POST['roomId']),
            'roomNumber' => intval($_POST['roomNumber']),
            'userId' => intval($_POST['userId']),
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'startDay' => date("Y-m-d", (strtotime($_POST['startDay']))),
            'endDay' => date("Y-m-d", (strtotime($_POST['endDay']))),
            'startHour' => date("H:i", (strtotime($_POST['startHour']))),
            'endHour' => date("H:i", (strtotime($_POST['endHour'])))
        ];

        $roomId = intval($_POST['roomId']);
        $startDay = date("Y-m-d", (strtotime($_POST['startDay'])));
        $endDay = date("Y-m-d", (strtotime($_POST['endDay'])));
        $startHour = date("H:i", (strtotime($_POST['startHour'])));
        $endHour = date("H:i", (strtotime($_POST['endHour'])));

        $today = date("Y-m-d");

        if ($startDay < $today || $endDay < $today) {
            $value = 'wrongDates';
            $session = new Session();
            $session->set($value);
        } elseif ($startHour === $endHour) {
            $value = 'wrongHours';
            $session = new Session();
            $session->set($value);
        } else {
            $repository = new ReservationRepository();
            $reservatedRooms = $repository->checkReservatedRooms($roomId, $startDay, $startHour, $endHour);

            if ($reservatedRooms === 'true') {
                $reservationService = new ReservationService();
                $reservationService->updateReservation($updateReservation);
            } else {
                $value = 'roomsCollision';
                $session = new Session();
                $session->set($value);
            }
        }
    }
}