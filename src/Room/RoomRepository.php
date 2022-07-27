<?php

namespace Room;


use Room\Room;
use SystemDatabase\MysqlConnection;
use Reservation\ReservationService;

class RoomRepository
{
    #private $roomId;
    #private $name;
    #private $floor;

    public function addRoom(Room $objectRoom)
    {
        if(count($_POST) > 0)
        {
            #$this->roomId = $_POST['roomId'];
            #$this->floor = $_POST['floor'];

            $dbConnection = MysqlConnection::getInstance();

            $insert = "
            INSERT INTO room (room_name, floor)
            VALUES(
                   '".$objectRoom->getRoomName()."',
                   '".$objectRoom->getFloor()."'
            );
            ";

            $dbConnection->query($insert);
        }
    }

    public function readRoom()
    {
        $dbConnection = MysqlConnection::getInstance();

        $query = "SELECT * FROM room";
        $result = $dbConnection->query($query)->fetchAll();

        return $result;
    }

    public function roomNameById($id)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT room_name FROM room WHERE id = " . $id . ";";
        $result = $dbConnection->query($query)->fetch();
        $result = $result['room_name'];

        return $result;
    }
}