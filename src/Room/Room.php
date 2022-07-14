<?php

namespace Room;

class Room
{
    private int $roomId;
    #private string $name;
    private int $floor;

    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }

    public function getRoomId()
    {
        return $this->roomId;
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