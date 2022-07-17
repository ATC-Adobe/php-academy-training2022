<?php

namespace Reservation;

class ReservationModel
{
    protected int $id;
    protected int $roomId;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected $startDay;
    protected $endDay;
    protected $startHour;
    protected $endHour;

    public function sendDataToModel(array $dataReservation)
    {
        $this->roomId = $dataReservation['roomId'];
        $this->firstName = $dataReservation['firstName'];
        $this->lastName = $dataReservation['lastName'];
        $this->email = $dataReservation['email'];
        $this->startDay = $dataReservation['startDay'];
        $this->endDay = $dataReservation['endDay'];
        $this->startHour = $dataReservation['startHour'];
        $this->endHour = $dataReservation['endHour'];
    }

    public function updateReservation(array $updateReservation)
    {
        $this->id = $updateReservation['id'];
        $this->roomId = $updateReservation['roomId'];
        $this->firstName = $updateReservation['firstName'];
        $this->lastName = $updateReservation['lastName'];
        $this->email = $updateReservation['email'];
        $this->startDay = $updateReservation['startDay'];
        $this->endDay = $updateReservation['endDay'];
        $this->startHour = $updateReservation['startHour'];
        $this->endHour = $updateReservation['endHour'];
    }

    public function setRoomId(int $roomId)
    {
        $this->roomId = $roomId;
        return $this;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function setStartDay($startDay)
    {
        $this->startDay = $startDay;
        return $this;
    }

    public function setEndDay($endDay)
    {
        $this->endDay = $endDay;
        return $this;
    }

    public function setStartHour($startHour)
    {
        $this->startHour = $startHour;
        return $this;
    }

    public function setEndHour($endHour)
    {
        $this->endHour = $endHour;
        return $this;
    }

    public function getRoomId()
    {
        return $this->roomId;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getStartDay()
    {
        return $this->startDay;
    }

    public function getEndDay()
    {
        return $this->endDay;
    }

    public function getStartHour()
    {
        return $this->startHour;
    }

    public function getEndHour()
    {
        return $this->endHour;
    }
}