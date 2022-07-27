<?php

namespace Api\Reservation;

date_default_timezone_set('Europe/Warsaw');

use Reservation\ReservationRepository;
use Reservation\ReservationService;

class ReservationApi
{
    public function addReservation()
    {
        try {
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
                'endHour' => date("H:i", (strtotime($_POST['endHour'])))
            ];

            $userId = htmlspecialchars($_POST['userId']);
            $roomId = htmlspecialchars($_POST['roomId']);
            $startDay = htmlspecialchars($_POST['startDay']);
            $startHour = htmlspecialchars($_POST['startHour']);
            $endHour = htmlspecialchars($_POST['endHour']);

            $repository = new ReservationRepository();
            $checkRooms = $repository->checkReservatedRooms($roomId, $startDay, $startHour, $endHour);

            if ($checkRooms === 'true') {
                $service = new ReservationService();
                $service->createReservation($dataReservation);
            } else {
                http_response_code(409);
            }

            $newestReservations = $repository->getTheNewestReservation($userId);

            $reservation = [];
            foreach ($newestReservations as $newestReservation) {
                $reservation[] = [
                    'userId' => $newestReservation['id'],
                    'reservationId' => $newestReservation['0'],
                    'roomId' => $newestReservation['5'],
                    'startDay' => $newestReservation['startDay'],
                    'endDay' => $newestReservation['endDay'],
                    'startHour' => $newestReservation['startHour'],
                    'endHour' => $newestReservation['endHour']
                ];
            }
            return $reservation;
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }
}