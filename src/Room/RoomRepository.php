<?php

namespace Room;

use System\Database\MysqlConnection;

class RoomRepository
{

    public function getAllRooms()
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT * FROM rooms;";
        return $connection->query($selectQuery)->fetchAll();
    }

    public function addRoom(RoomModel $roomModel)
    {
        $connection = MysqlConnection::getInstance();

        $createRoom = "INSERT INTO rooms (roomNumber, floorNumber) VALUES (:roomNumber, :floorNumber)";

        $statement = $connection->prepare($createRoom);

        $statement->bindValue(':roomNumber', $roomModel->getRoomNumber());
        $statement->bindValue(':floorNumber', $roomModel->getFloorNumber());
        $statement->execute();
    }
}