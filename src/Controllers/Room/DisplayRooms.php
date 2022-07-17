<?php

namespace Controllers\Room;

use Room\RoomRepository;

class DisplayRooms
{
    public function displayRooms()
    {
        $displayRooms = new RoomRepository();
        return $displayRooms->getAllRooms();
    }
}