<?php

namespace Service;

class CreateJsonReservation implements ReservationStrategy
{
    private $roomId;
    private $firstName;
    private $lastName;
    private $email;
    private $startDate;
    private $endDate;

    public function createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        // TODO: Json save repair

        $reservationFile = file_get_contents((new ApplicationService())->getJsonReservationUrl());
        $save_data[] = json_encode($reservationFile, JSON_PRETTY_PRINT);
        $this->reservationFile = file_put_contents('../System/File/reservations.json', $save_data);
    }
}