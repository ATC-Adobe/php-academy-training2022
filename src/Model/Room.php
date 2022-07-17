<?php

namespace Model;

use Model\Reservation;

class Room
{
    private int $roomId;
    private string $name;
    private int $floor;

    public function __construct($roomId, $name, $floor){

    }

    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }

    public function getRoomId()
    {
        return $this->roomId;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    public function getFloor()
    {
        return $this->floor;
    }


}