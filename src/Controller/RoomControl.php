<?php

namespace Controller;

include("../../autoloading.php");
use SystemDatabase\MysqlConnection;

class RoomControl
{
    public function getRoomStart($roomId)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT start FROM reservation WHERE room_id = ".$roomId.";";
        $result = $dbConnection->query($query)->fetch();

        return $result;
    }

    public function getRoomEnd($roomId)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT end FROM reservation WHERE room_id = ".$roomId.";";
        $result = $dbConnection->query($query)->fetch();

        return $result;
    }

}

$aa = new RoomControl;
$aa = $aa->getRoomStart(2);
var_dump($aa);