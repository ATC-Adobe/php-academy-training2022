<?php

namespace Service;

class ReservationContext
{
    private $strategy;
    private $roomId;
    private $firstName;
    private $lastName;
    private $email;
    private $startDate;
    private $endDate;

    public function __construct(ReservationStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function createReservation(
        $roomId,
        $firstName,
        $lastName,
        $email,
        $startDate,
        $endDate
    ) {
        $this->roomId = $roomId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->strategy->createReservation(
            $this->roomId,
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->startDate,
            $this->endDate
        );
    }
}