<?php

namespace Repository;

use Database\Connection;

class Room
{
    public function addRoom()
    {
        require_once '../../autoloading.php';
        $dbConnection = Connection::getInstance();

        if (count($_POST) > 0) {
            $name = $_POST['name'];
            $floor = $_POST['floor'];
            $insertQuery = "
    INSERT INTO room (name, floor)
    VALUES (
            '$name',
            '$floor'
            );
";
            $dbConnection->query($insertQuery);
        }
    }

}