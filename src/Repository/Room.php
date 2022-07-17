<?php

namespace Repository;

use Database\Connection;

require_once '../../autoloading.php';
class Room
{
    public function addRoom()
    {
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