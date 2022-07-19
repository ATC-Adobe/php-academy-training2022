<?php

namespace Reservation;

class ReservationModel
{
    protected int $id;
    protected int $userId;
    protected int $roomId;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $startDay;
    protected string $endDay;
    protected string $startHour;
    protected string $endHour;

    public function sendDataToModel(array $dataReservation): void
    {
        $this->roomId = $dataReservation['roomId'];
        $this->userId = $dataReservation['userId'];
        $this->firstName = $dataReservation['firstName'];
        $this->lastName = $dataReservation['lastName'];
        $this->email = $dataReservation['email'];
        $this->startDay = $dataReservation['startDay'];
        $this->endDay = $dataReservation['endDay'];
        $this->startHour = $dataReservation['startHour'];
        $this->endHour = $dataReservation['endHour'];
    }

    public function sendUpdatedDataToModel(array $updateReservation): void
    {
        $this->roomId = $updateReservation['roomId'];
        $this->userId = $updateReservation['userId'];
        $this->roomNumber = $updateReservation['roomNumber'];
        $this->firstName = $updateReservation['firstName'];
        $this->lastName = $updateReservation['lastName'];
        $this->email = $updateReservation['email'];
        $this->startDay = $updateReservation['startDay'];
        $this->endDay = $updateReservation['endDay'];
        $this->startHour = $updateReservation['startHour'];
        $this->endHour = $updateReservation['endHour'];
    }

    public function setRoomId(int $roomId): int
    {
        $this->roomId = $roomId;
        return $this;
    }

    public function setUserId(int $userId): int
    {
        $this->userId = $userId;
        return $this;
    }

    public function setFirstName(string $firstName): string
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): string
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setEmail(string $email): string
    {
        $this->email = $email;
        return $this;
    }

    public function setStartDay($startDay): string
    {
        $this->startDay = $startDay;
        return $this;
    }

    public function setEndDay($endDay): string
    {
        $this->endDay = $endDay;
        return $this;
    }

    public function setStartHour($startHour): string
    {
        $this->startHour = $startHour;
        return $this;
    }

    public function setEndHour($endHour): string
    {
        $this->endHour = $endHour;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStartDay(): string
    {
        return $this->startDay;
    }

    public function getEndDay(): string
    {
        return $this->endDay;
    }

    public function getStartHour(): string
    {
        return $this->startHour;
    }

    public function getEndHour(): string
    {
        return $this->endHour;
    }
}