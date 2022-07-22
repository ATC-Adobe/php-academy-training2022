<?php

namespace Service;

interface ReservationStrategy
{
    public function createReservation(
        $roomId,
        $userId,
        $firstName,
        $lastName,
        $email,
        $startDate,
        $endDate
    );
}