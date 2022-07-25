<?php

declare(strict_types=1);

namespace Repository;

use Model\User;
use Service\ApplicationService;
use System\Database\Connection;

class RegisterRepository extends Connection
{
    public function setUser($firstname, $lastname, $login, $email, $password)
    {
        $statement = self::getConnection()->prepare(
            "INSERT INTO users (firstname, lastname, login, email, password) VALUES(?,?,?,?,?);"
        );
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$statement->execute(array($firstname, $lastname, $login, $email, $hashedPassword))) {
            $statement = null;
            (new ApplicationService())->getRegisterHeader();
            exit();
        }
    }

    protected function checkLogin($login)
    {
        $statement = self::getConnection()->prepare("SELECT login FROM users WHERE login = ?;");
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
    }

    protected function checkEmail($email)
    {
        $statement = self::getConnection()->prepare("SELECT email FROM users WHERE email = ?;");
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
    }
}