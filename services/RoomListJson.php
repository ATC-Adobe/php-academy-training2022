<?php

require_once 'services/ApplicationService.php';

class RoomListJson

{
    private $jsonList;

    function __construct()
    {
        $this->jsonList = file_get_contents((new ApplicationService())->getJsonRoomUrl());
    }

    public function getRoomListJson()
    {
        $rooms = [];
        $jsonRooms = json_decode($this->jsonList);
        foreach ($jsonRooms as $room) {
            $rooms[] = [
                'room_id' => $room->room_id,
                'name' => $room->name,
                'floor' => $room->floor,
            ];
        }
        return $rooms;
    }
}