<?php

declare(strict_types=1);

namespace Repository;

use Model\Room;
use Service\ApplicationService;
use Service\Session;
use System\Database\Connection;


class RoomRepository extends Room
{
    public function getAllRooms(Connection $dbConnection): array
    {
        $rooms = $dbConnection->query("SELECT * FROM rooms ORDER BY 'room id' ASC")->fetchAll();
        return $rooms;
    }

    public function storeRoom($name, $floor): void
    {
        $dbConnection = Connection::getConnection();
        $dbConnection->query(
            "INSERT INTO rooms(name, floor) VALUES('$name', '$floor')"
        );
        $sessionMsg = new Session();
        $sessionMsg->sessionMessage('roomCreated');
        (new ApplicationService())->getRoomsListHeader();
    }

    public function destroy(Connection $dbConnection): void
    {
        $roomId = $_GET['room_id'];
        $dbConnection->query(
            "DELETE FROM rooms WHERE room_id='$roomId'"
        );
        $sessionMsg = new Session();
        $sessionMsg->sessionMessage('roomDeleted');
        (new ApplicationService())->getRoomsListHeader();
    }
}