<?php

namespace Model;

class Reservation
{
    private int $reservation_id;
    private int $room_id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private \DateTime $start_date;
    private \DateTime $end_date;

    public function __construct(
        int $reservation_id,
        int $room_id,
        string $firstname,
        string $lastname,
        string $email,
        \DateTime $start_date,
        \DateTime $end_date,
    ) {
        $this->reservation_id = $reservation_id;
        $this->room_id = $room_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }


    public function getReservationId(): int
    {
        return $this->reservation_id;
    }

    public function getRoomId(): int
    {
        return $this->room_id;
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

    public function getStartDate(): \DateTime
    {
        return $this->start_date;
    }

    public function getEndDate(): \DateTime
    {
        return $this->end_date;
    }
}