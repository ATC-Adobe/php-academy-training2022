<?php

namespace User;

include("../../autoloading.php");
use SystemDatabase\MysqlConnection;


class UserRepository
{
    public function getUserId($nickname)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT id FROM user WHERE nickname = '" . $nickname . "';";
        $result = $dbConnection->query($query)->fetch();
        $result = $result['id'];

        return $result;
    }
}
