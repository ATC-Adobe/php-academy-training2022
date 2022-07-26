<?php

namespace Api\Room;

use System\Database\Connection;

class RoomApi
{
    protected Connection $dbConnection;

    public function __construct()
    {
        $this->dbConnection = Connection::getConnection();
    }

    public function getRooms(): array
    {
        $query = "SELECT * FROM rooms";
        try {
            $queryResult = $this->dbConnection->query($query)->fetchAll();
            $rooms = [];
            foreach ($queryResult as $res) {
                $rooms[] =
                    [
                        'room_id' => $res['room_id'],
                        'room_name' => $res['name'],
                        'room_flor' => $res['floor']
                    ];
            }
            return ['rooms' => $rooms];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }
}