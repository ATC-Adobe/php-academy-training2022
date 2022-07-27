<?php

namespace Room;

class Room
{
    private string $room_name;
    #private string $name;
    private int $floor;

    public function setRoomName($room_name)
    {
        $this->room_name = $room_name;
    }

    public function getRoomName()
    {
        return $this->room_name;
    }

    #public function setname($name)
    #{
        #$this->name = $name;
    #}

    #public function getname()
    #{
        #return $this->name;
    #}

    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    public function getFloor()
    {
        return $this->floor;
    }

}