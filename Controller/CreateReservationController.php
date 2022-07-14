<?php

namespace Controller;

use Repository\ReservationFormValidation;
use Repository\ReservationRepository;

class CreateReservationController
{
    public function createReservation(
        string $error,
        string $roomId,
        string $firstName,
        string $lastName,
        string $email,
        string $startDate,
        string $endDate
    ): array {
        if (isset($_POST['submit'])) {
            [$error, $roomId, $firstName, $lastName, $email, $startDate, $endDate] = (new ReservationFormValidation(
            ))->validated(
                $error,
                $roomId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                (new ReservationRepository(
                    'reservation_id',
                    'room_id',
                    'firstname',
                    'lastname',
                    'email',
                    'start_date',
                    'end_date'
                ))->storeReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate);
            }
        }
        return array($error, $roomId, $firstName, $lastName, $email, $startDate, $endDate);
    }
}