<?php

namespace services;

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
        $rows = count(file("../Data/reservations.csv"));
        if ($rows > 1) {
            $rows = ($rows - 1) + 1;
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

    public function getJsonReservationsUrl(): string
    {
        return '../System/File/reservations.json';
    }

    public function getXmlRoomUrl(): string
    {
        return '../System/File/rooms.xml';
    }

    public function getJsonRoomUrl(): string
    {
        return '../System/File/rooms.json';
    }
}