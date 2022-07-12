<?php

namespace App\Service;

use App\Model\RoomModel;
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

    public function addRoom(RoomModel $room): bool
    {
        return $this->repo->save($room);
    }
}