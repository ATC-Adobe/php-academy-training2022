<?php

namespace Room;

use Room\RoomModel;

class RoomService
{
    public function createRoom(array $roomData)
    {
        $roomModel = new RoomModel();
        $roomModel->createRoom($roomData);

        $roomRepository = new RoomRepository();
        $roomRepository->addRoom($roomModel);
    }
}