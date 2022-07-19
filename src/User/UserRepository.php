<?php

namespace User;

use System\Database\MysqlConnection;

class UserRepository
{
    public function addUser(UserModel $userModel): void
    {
        $connection = MysqlConnection::getInstance();

        $addUser = "INSERT INTO user (firstName, lastName, nickName, email, password) VALUES (:firstName, :lastName, :nickName, :email, :password)";

        $statement = $connection->prepare($addUser);
        $statement->bindValue(':firstName', $userModel->getFirstName());
        $statement->bindValue(':lastName', $userModel->getLastName());
        $statement->bindValue(':nickName', $userModel->getNickName());
        $statement->bindValue(':email', $userModel->getEmail());
        $statement->bindValue(':password', $userModel->getPassword());
        $statement->execute();
    }

    public function getUserId($nickName)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT id FROM user WHERE nickName = :nickName";
        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':nickName', $nickName);
        $statement->execute();
        $userId = $statement->fetchAll();

        return $userId;
    }

    public function getUserByNickName(string $nickName)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT * FROM user WHERE nickName = :nickName";
        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':nickName', $nickName);
        $statement->execute();
        $nickNameCheck = $statement->fetchAll();

        if (count($nickNameCheck) === 1) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function getUserByEmail(string $email)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT * FROM user WHERE email = :email";
        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $emailCheck = $statement->fetchAll();

        if (count($emailCheck) === 1) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function getUserPassword($nickName)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT password FROM user WHERE nickName = :nickName";
        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':nickName', $nickName);
        $statement->execute();
        return $statement->fetchAll();
    }
}