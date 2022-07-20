<?php
namespace src\Room\Repository;
use src\Room\Model\RoomModel;
use System\Database\Connection;
//include_once 'System/Database/Connection.php';

class RoomRepository extends RoomModel {
//    public function __construct(){}
    public function saveRoom(){
        Connection::getInstance()
            ->query("INSERT INTO rooms 
                    (roomName, floor) 
                    VALUES
                        (
                         '$this->roomName',
                         '$this->floor'
                        );"
            );
    }
    public static function getRoom(){
        return Connection::getInstance()
            ->query("SELECT * FROM rooms;");
    }
}