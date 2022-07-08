<?php

class RoomList
{
    private $list;

    public function __construct()
    {
        $this->list = new SplFileObject('data/rooms.csv','r');
    }

    public function getRoomsList()
    {
        $this->list->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::READ_AHEAD);
        $rooms = [];
        foreach ($this->list as $room) {
            $rooms [] = [
                'room_id' => $room[0],
                'name' => $room[1],
                'floor' => $room[2],
            ];
        }
        return $rooms;
    }
}