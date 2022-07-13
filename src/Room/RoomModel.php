<?php

//declare(strict_types=1);

namespace Room;

class RoomModel
{
    protected int $roomNumber;
    protected int $floorNumber;

    public function createRoom(array $roomData)
    {
        $this->roomNumber = $roomData['roomNumber'];
        $this->floorNumber = $roomData['floorNumber'];
    }

    public function setRoomNumber(int $roomNumber)
    {
        $this->roomNumber = $roomNumber;
        return $this;
    }

    public function setFloorNumber(string $floorNumber)
    {
        $this->floorNumber = $floorNumber;
        return $this;
    }

    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function getFloorNumber()
    {
        return $this->floorNumber;
    }
}