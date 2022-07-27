<?php

namespace User;

include("../../autoloading.php");

use SystemDatabase\MysqlConnection;
use PDO;
use User\User;
use Controller\RegisterControl;

class Authenticator
{
    public function register()
    {
        if(count($_POST) > 0){

        $checkNickname = new RegisterControl;
        $isIsset = $checkNickname->nickNameControl($_POST['new_nickname']);

        if($isIsset > 0)
            {
                #echo "You have to change your nickname";
                return 1;
            }
        else{

            $newUser = new User;
            $newUser->setName($_POST['new_name']);
            $newUser->setSurname($_POST['new_surname']);
            $newUser->setEmail($_POST['new_email']);
            $newUser->setNickname($_POST['new_nickname']);
            $_POST['new_password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $newUser->setPassword($_POST['new_password']);

            $dbConnection = MysqlConnection::getInstance();

            $insert = "
        INSERT INTO user (name, surname, email, nickname, password)
        VALUES(
               '" . $newUser->getName() . "',
               '" . $newUser->getSurname() . "',
               '" . $newUser->getEmail() . "',
               '" . $newUser->getNickname() . "',
               '" . $newUser->getPassword() . "'
        );
        ";

            $dbConnection->query($insert);

            $session = Session::getInstance();
            $session->start();

        }
        }
    }

    public function login()
    {
        if($_POST > 0)
        {
            $email = $_POST['email'];
            $nickname = $_POST['nickname'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $dbConnection = MysqlConnection::getInstance();

            $insert = "SELECT id FROM user WHERE (nickname = '".$nickname."' AND password = '".$password."' AND email = '".$email."' );";
            $result = $dbConnection->query($insert)->fetchAll();


            if($result > 0)
            {
                $session = Session::getInstance();
                $session->start();
                $session->setData($_POST['nickname']);

            }
            else
            {
                return 1;
            }


        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }



}
