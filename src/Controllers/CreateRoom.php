<?php

declare(strict_types=1);

namespace Controllers;

use Room\RoomService;

class CreateRoom
{

    public function createRoom()
    {
        $roomData = [
            'roomNumber' => $_POST['roomNumber'],
            'floorNumber' => $_POST['floorNumber'],
        ];

        $roomService = new RoomService();
        $roomService->createRoom($roomData);
    }
}