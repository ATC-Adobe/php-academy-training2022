<?php

namespace Model;

class Room
{
    private $room_id;
    private string $name;
    private $floor;

    public function __construct(
        $room_id,
        string $name,
        $floor
    ) {
        $this->room_id = $room_id;
        $this->name = $name;
        $this->floor = $floor;
    }

    public function getRoomId()
    {
        return $this->room_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFloor()
    {
        return $this->floor;
    }
}