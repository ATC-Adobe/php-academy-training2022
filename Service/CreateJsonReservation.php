<?php

namespace Service;

class CreateJsonReservation implements ReservationStrategy
{

    public function createReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $reservation = array($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate);
        if (filesize((new ApplicationService())->getJsonReservationUrl()) === 0) {
            $newRecord = array($reservation);
            $saveReservation = $newRecord;
        } else {
            $existReservations = json_decode(file_get_contents(((new ApplicationService())->getJsonReservationUrl())));
            $existReservations[] = $reservation;
            $saveReservation = $existReservations;
        }
        $encoded = json_encode($saveReservation, JSON_PRETTY_PRINT);
        file_put_contents(((new ApplicationService())->getJsonReservationUrl()), $encoded, LOCK_EX);
    }
}