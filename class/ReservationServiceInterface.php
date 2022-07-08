<?php

interface ReservationServiceInterface
{
    public function createReservation($id, $firstName, $lastName, $email, $startDay, $endDay, $startHour, $endHour);
}