<?php

namespace Model;

class Reservation
{
    private $reservation_id;
    private $room_id;
    private $userId;
    private string $firstname;
    private string $lastname;
    private string $email;
    private $start_date;
    private $end_date;

    public function __construct(
        $reservation_id,
        $room_id,
        $userId,
        string $firstname,
        string $lastname,
        string $email,
        $start_date,
        $end_date,
    ) {
        $this->reservation_id = $reservation_id;
        $this->room_id = $room_id;
        $this->userId = $userId;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }


    public function getReservationId()
    {
        return $this->reservation_id;
    }

    public function getRoomId()
    {
        return $this->room_id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }
}