<?php

class RoomListXml
{
    private $xmlList;

    public function __construct()
    {
        $this->xmlList = new SimpleXMLElement('data/rooms.xml',0, TRUE);
    }

    public function getRoomListXml()
    {
        $rooms = [];
        foreach ($this->xmlList as $room) {
            $rooms [] = [
                'room_id'=>$room->room_id,
                'name'=>$room->name,
                'floor'=>$room->floor,
            ];
        }
        return $rooms;
    }
}