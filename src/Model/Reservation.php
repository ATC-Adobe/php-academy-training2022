<?php

class Reservation
{
    private int $reservationId;
    private int $roomId;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $startDate;
    private string $endDate;

    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }
    public function getReservationId()
    {
        return $this->reservationId;
    }

    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }
    public function getRoomId()
    {
        return $this->roomId;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
    public function getEndDate()
    {
        return $this->endDate;
    }
}