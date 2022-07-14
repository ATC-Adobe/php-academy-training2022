<?php

namespace Room;

include("../../autoloading.php");
use Room\RoomRepository;
use Room\Room;

class RoomService
{
    public function createRoom()
    {
        $newRoom = new Room;

        $newRoom->setRoomId($_POST['room_id']);
        $newRoom->setFloor($_POST['floor']);

        $addRoom = new RoomRepository;
        $addRoom->addRoom($newRoom);
    }
}