<?php

namespace Room;

#include("../../autoloading.php");
use Room\RoomRepository;
use Room\Room;

class RoomService
{
    public function createRoom()
    {
        if(count($_POST) > 0){
        $newRoom = new Room;

        $newRoom->setRoomName($_POST['room_name']);
        $newRoom->setFloor($_POST['floor']);

        $addRoom = new RoomRepository;
        $addRoom->addRoom($newRoom);}
    }
}