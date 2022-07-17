<?php

namespace Service;

class ApplicationService
{
    public function getReservationListHeader(): void
    {
        header('location:/View/reservations.php?msg=add');
    }

    public function getRoomsListHeader(): void
    {
        header('location:/View/rooms.php?msg=add');
    }

    public function getRows(): int
    {
        $rows = count(file($this->getCsvReservationUrl()));
        if ($rows > 1) {
            $rows = ++$rows;
        }
        return $rows;
    }

    public function getJsonRows()
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