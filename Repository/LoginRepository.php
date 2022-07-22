<?php

namespace Repository;

use PDO;
use Service\ApplicationService;
use Service\Session;
use System\Database\Connection;

class LoginRepository extends Connection
{
    protected function getUser($login, $password)
    {
        $sessionMsg = new Session();
        $statement = self::getConnection()->prepare("SELECT password FROM users WHERE login = ? OR email = ?;");
        if (!$statement->execute(array($login, $password))) {
            $statement = null;
            $sessionMsg->sessionMessage('error');
            (new ApplicationService())->getLoginHeader();
            exit();
        }
        if ($statement->rowCount() == 0) {
            $statement = null;
            $sessionMsg->sessionMessage('wrongLogin');
            (new ApplicationService())->getLoginHeader();
        }
        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $passwordCheck = password_verify($password, $passwordHashed[0]['password']);
        if ($passwordCheck == false) {
            $statement = null;
            $sessionMsg->sessionMessage('wrongPassword');
            (new ApplicationService())->getLoginHeader();
            exit();
        }
        if ($passwordCheck == true) {
            $statement = self::getConnection()->prepare(
                "SELECT * FROM users WHERE login = ? OR email = ? AND password = ?;"
            );
            if (!$statement->execute(array($login, $login, $password))) {
                $statement = null;
                $sessionMsg->sessionMessage('error');
                (new ApplicationService())->getLoginHeader();
                exit();
            }
            if ($statement->rowCount() == 0) {
                $statement = null;
                $sessionMsg->sessionMessage('wrongLogin');
                (new ApplicationService())->getLoginHeader();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['userid'] = $user[0]['user_id'];
            $_SESSION['userlogin'] = $user[0]['login'];
            $statement = null;
            $sessionMsg->sessionMessage('loginSuccess');
            (new ApplicationService())->getReservationListHeader();
            exit();
        }
    }
}