<?php
namespace src\LogIn\Repository;
use http\QueryString;
use src\LogIn\Model\LogInModel;
use System\Database\Connection;


class LogInRepository extends LogInModel {
    public string $session;
    public string $nickname;
    public string $password;
//    public function __construct(){}
    public static function findUser($nickname,$password) {

        return Connection::getInstance()
            ->query("SELECT * FROM user
                    WHERE nickname ='$nickname' AND password ='$password';"
            );


    }


}