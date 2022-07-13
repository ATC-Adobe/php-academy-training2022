<?php

namespace Repository;

use services\ApplicationService;
use System\Database\Connection;


class RoomService
{
    public function getAllRooms(Connection $dbConnection): array
    {
        $rooms = $dbConnection->query("SELECT * FROM rooms ORDER BY 'room id' ASC")->fetchAll();
        return $rooms;
    }

    public function storeRoom($name, $floor)
    {
        $dbConnection = Connection::getConnection();
        $dbConnection->query(
            "INSERT INTO rooms(name, floor) VALUES('$name', '$floor')"
        );
        (new ApplicationService())->getRoomsListHeader();
    }

    function destroy(Connection $dbConnection): void
    {
        $roomId = $_GET['room_id'];
        $dbConnection->query(
            "DELETE FROM rooms WHERE room_id='$roomId'"
        );
        (new ApplicationService())->getRoomsListHeader();
    }
}