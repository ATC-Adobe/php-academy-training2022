<?php

namespace Repository;

use Database\Connection;
use Exception;
use PDO;


class Validator
{
    protected string $email;
    protected string $nickname;
    protected string $password;

    public function __construct($email, $nickname, $password)
    {

    }

    public function checkEmail($email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    public function checkNickname($nickname): bool
    {
        if(!isset($nickname) || !is_string($nickname) || strlen($nickname) < 8){
            return false;
        }else{
            return true;
        }
    }

    public function checkNicknameUnique($nickname): bool
    {
        $dbConnection = Connection::getInstance();
        $selectQuery = "
    SELECT nickname
    FROM user;
";
        $selectResults = $dbConnection->query($selectQuery)->fetchAll(PDO::FETCH_ASSOC);
        var_dump($selectResults);
        $result = array_search($nickname, $selectResults);
        var_dump($nickname);
        var_dump($result);
//        if(!isset($nickname) || !is_string($nickname) || strlen($nickname) < 8){
//            return false;
//        }else{
//            return true;
//        }
    }

    public function checkPassword($password): bool
    {
        if(!isset($password) || !is_string($password) || strlen($password) < 8){
            return false;
        }else{
            return true;
        }
    }


}