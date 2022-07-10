<?php

require_once 'services/ApplicationService.php';

class RoomListXml
{
    private $xmlList;

    public function __construct()
    {
        $this->xmlList = new SimpleXMLElement((new ApplicationService())->getXmlRoomUrl(),0, TRUE);
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