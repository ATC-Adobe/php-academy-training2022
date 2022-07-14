<?php

namespace Room;



require_once('../../autoloading.php');
use Room\Room;
use SystemDatabase\MysqlConnection;


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
            INSERT INTO newSelectedRooms (roomId, floor)
            VALUES(
                   '".$objectRoom->getRoomId()."',
                   '".$objectRoom->getFloor()."'
            );
            ";

            $dbConnection->query($insert);
        }
    }
}