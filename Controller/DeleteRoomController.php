<?php

namespace Controller;

use Repository\RoomRepository;
use Service\ApplicationService;
use System\Database\Connection;

class DeleteRoomController
{
    public function deleteRoom(Connection $dbConnection): void
    {
        if (isset($_GET['room_id'])) {
            (new RoomRepository('$room_id', 'name', 'floor'))->destroy($dbConnection);
        }
        (new ApplicationService())->getRoomsListHeader();
    }
}