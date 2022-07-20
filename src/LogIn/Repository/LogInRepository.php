<?php
namespace src\LogIn\Repository;
use http\QueryString;
use src\LogIn\Model\LogInModel;
use System\Database\Connection;


class LogInRepository extends LogInModel {
    public string $session;
//    public function __construct(){}
    public function findUser() {
        Connection::getInstance()
            ->query("SELECT * FROM user
                    WHERE nickname ='$this->nickname' AND password ='$this->password';"
            );


    }


}