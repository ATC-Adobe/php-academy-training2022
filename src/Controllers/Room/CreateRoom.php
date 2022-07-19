<?php

namespace Controllers\Room;

use Room\RoomService;

class CreateRoom
{

    public function createRoom(): void
    {
        $roomData = [
            'roomNumber' => $_POST['roomNumber'],
            'floorNumber' => $_POST['floorNumber'],
        ];

        $roomService = new RoomService();
        $roomService->createRoom($roomData);
    }
}