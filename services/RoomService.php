<?php

require_once 'db/Connection.php';
require_once 'services/ApplicationService.php';

class RoomService
{
    private $list;

    public function __construct()
    {
        $this->list = new SplFileObject('data/rooms.csv', 'r');
    }

    public function getRoomsList(): array
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

    public function getRooms(Connection $dbConnection): array|false
    {
        $rooms = $dbConnection->query("SELECT * FROM rooms ORDER BY room_id ASC")->fetchAll();
        return $rooms;
    }

    public function addDbRoom($name, $floor)
    {
        $dbConnection = Connection::getConnection();
        $addQuery = $dbConnection->query(
            "INSERT INTO rooms(name, floor) VALUES('$name', '$floor')"
        );
    }
}