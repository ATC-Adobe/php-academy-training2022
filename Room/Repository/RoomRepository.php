<?php
namespace Room\Repository;
use Room\Model\RoomModel;
use System\Database\MysqlConnection;
include 'System/Database/MysqlConnection.php';

class RoomRepository extends RoomModel {
//    public function __construct(){}
    public function saveRoom(){
        MySqlConnection::getInstance()
            ->query("INSERT INTO rooms 
                    (roomName, floor) 
                    VALUES
                        (
                         '$this->roomName',
                         '$this->floor'
                        );"
            );
    }
}