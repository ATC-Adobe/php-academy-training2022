<?php

namespace Controllers\Room;

use Room\RoomService;

class CreateRoom
{

    public function createRoom(): void
    {
        $roomData = [
            'roomNumber' => intval($_POST['roomNumber']),
            'floorNumber' => intval($_POST['floorNumber'])
        ];

        $roomService = new RoomService();
        $roomService->createRoom($roomData);
    }
}