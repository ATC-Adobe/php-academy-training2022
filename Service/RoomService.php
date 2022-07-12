<?php

namespace App\Service;

use App\Model\Room;
use App\Repository\RoomRepository;

class RoomService
{

    protected RoomRepository $repo;

    public function __construct()
    {
        $this->repo = new RoomRepository();
    }

    public function readRooms(): bool|array
    {
        return $this->repo->readAll();
    }

    public function addRoom(Room $room): bool
    {
        return $this->repo->save($room);
    }
}