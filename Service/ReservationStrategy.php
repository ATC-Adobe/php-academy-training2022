<?php

namespace Service;

interface ReservationStrategy
{
    public function createReservation(
        $roomId,
        $firstName,
        $lastName,
        $email,
        $startDate,
        $endDate
    );
}