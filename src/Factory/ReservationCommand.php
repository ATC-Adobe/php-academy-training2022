<?php

namespace Factory;

class ReservationCommand implements ICommand
{
    private array $dataReservation;
    private object $objectStrategy;

    public function __construct($dataReservation, IReservation $object)
    {
        $this->dataReservation = $dataReservation;
        $this->objectStrategy = $object;
    }

    public function makeReservation()
    {
        $this->objectStrategy->createReservation($this->dataReservation);
    }
}