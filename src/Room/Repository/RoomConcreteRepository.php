<?php

namespace Room\Repository;

use Room\Model\RoomModel;
use System\Database\MySqlConnection;

class RoomConcreteRepository {
    public function __construct() {}

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

    public function addRoom(RoomModel $room) : void {
        $name = $room->getName();
        $floor = $room->getFloor();

        MySqlConnection::getInstance()
            ->query("INSERT INTO Rooms (name, floor)
                                VALUES ($name, $floor);");
    }
}