<?php

namespace Controller;

use Repository\RoomService;
use System\Database\Connection;

class DeleteRoomController
{
    public function deleteRoom(Connection $dbConnection): void
    {
        if (isset($_GET['room_id'])) {
            (new RoomService())->destroy($dbConnection);
        }
    }
}