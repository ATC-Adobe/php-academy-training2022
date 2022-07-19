<?php

namespace Controllers\Room;

use Room\RoomRepository;

class DisplayRooms
{
    public function displayRooms(): bool|array
    {
        $displayRooms = new RoomRepository();
        return $displayRooms->getAllRooms();
    }
}