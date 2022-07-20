<?php

namespace Repository;

use PDO;
use System\Database\Connection;

class LoginRepository extends Connection
{
    protected function getUser($login, $password)
    {
        $statement = self::getConnection()->prepare("SELECT password FROM users WHERE login = ? OR email = ?;");
        if (!$statement->execute(array($login, $password))) {
            $statement = null;
//            header('location:../index.php?error=statementfailed');
            exit();
        }
        if ($statement->rowCount() == 0) {
            $statement = null;
            header('location: ../index.php?error=usernotfound');
        }
        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $passwordCheck = password_verify($password, $passwordHashed[0]['password']);

        if ($passwordCheck == false) {
            $statement = null;
//            header('location: register.php?error=wrongpassword');
            exit();
        } elseif ($passwordCheck == true) {
            $statement = self::getConnection()->prepare(
                "SELECT * FROM users WHERE login = ? OR email = ? AND password = ?;"
            );
            if (!$statement->execute(array($login, $login, $password))) {
                $statement = null;
//            header('location:../index.php?error=statementfailed');
                exit();
            }
            if ($statement->rowCount() == 0) {
                $statement = null;
                header('location: ../index.php?error=usernotfound');
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $user[0]['user_id'];
            $_SESSION['userlogin'] = $user[0]['login'];
            $statement = null;
        }
    }
}