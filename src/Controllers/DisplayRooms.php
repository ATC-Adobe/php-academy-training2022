<?php

declare(strict_types=1);

namespace Controllers;

use Room\RoomRepository;

class DisplayRooms
{
    public function displayRooms()
    {
        $displayRooms = new RoomRepository();
        return $displayRooms->getAllRooms();
    }
}