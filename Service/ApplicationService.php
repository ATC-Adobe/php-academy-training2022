<?php

namespace Service;

class ApplicationService
{
    public function getReservationListHeader(): void
    {
        header('Location: /View/reservations.php');
    }

    public function getRoomsListHeader(): void
    {
        header('Location: /View/rooms.php');
    }

    public function getRegisterHeader(): void
    {
        header('location: ../Form/register.php');
    }

    public function getLoginHeader(): void
    {
        header('location: /Form/login.php');
    }

    public function getRows(): int
    {
        $rows = count(file($this->getCsvReservationUrl()));
        if ($rows > 1) {
            $rows = ++$rows;
        }
        return $rows;
    }

    public function getJsonRows(): int
    {
        $array[] = json_decode($this->getJsonRows(), true);
        $rows = end($array);
        if ($rows > 1) {
            $rows = ++$rows;
        }
        return $rows;
    }

    public function getCsvReservationUrl(): string
    {
        return '../System/File/reservations.csv';
    }

    public function getXmlReservationUrl(): string
    {
        return '../System/File/reservations.xml';
    }

    public function getJsonReservationUrl(): string
    {
        return '../System/File/reservations.json';
    }
}