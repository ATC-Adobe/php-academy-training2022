<?php

namespace Controller;

include("../../autoloading.php");

use SystemDatabase\MysqlConnection;

class RegisterControl
{
    public function nickNameControl($nickname)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT nickname FROM user WHERE nickname = '".$nickname."'; ";

        $result = $dbConnection->query($query)->fetch();

        return $result;
    }
}

