<?php

namespace Room\Repository;

use Room\Model\RoomModel;
use System\Database\MySqlConnection;

class RoomConcreteRepository {
    /**
     *
     */
    public function __construct() {}

    /**
     * Fetches RoomModel if room with given id exists
     *
     * @param int $id
     * @return RoomModel|null
     */
    public function getRoomById(int $id) : ?RoomModel {
        $res =
            MySqlConnection::getInstance()
            ->query("SELECT * FROM Rooms WHERE id = '$id';")
            ->fetchAll();

        if(count($res) == 0) {
            return null;
        }

        return new RoomModel(
            $res[0]['id'],
            $res[0]['name'],
            $res[0]['floor'],
        );
    }

    /**
     * Returns all valid rooms
     *
     * @return array<RoomModel>
     */
    public function getAllRooms() : array {
        $res =
            MySqlConnection::getInstance()
            ->query("SELECT * FROM Rooms;")
            ->fetchAll();

        $list = [];

        foreach ($res as $entry) {
            $list[] = new RoomModel(
                $entry['id'],
                $entry['name'],
                $entry['floor'],
            );
        }

        return $list;
    }

    /**
     * Adds room to the DB
     *
     * @param RoomModel $room
     * @return void
     */
    public function addRoom(RoomModel $room) : void {
        $name = $room->getName();
        $floor = $room->getFloor();

        MySqlConnection::getInstance()
            ->query("INSERT INTO Rooms (name, floor)
                                VALUES ('$name', '$floor');");
    }
}