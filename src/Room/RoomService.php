<?php

namespace Room;

class RoomService
{
    public function createRoom(array $roomData): void
    {
        $roomModel = new RoomModel();
        $roomModel->createRoom($roomData);

        $roomRepository = new RoomRepository();
        $roomRepository->addRoom($roomModel);
    }
}