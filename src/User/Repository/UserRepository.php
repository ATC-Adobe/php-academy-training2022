<?php

namespace User\Repository;

use User\Model\UserModel;
use System\Database\MysqlConnection;

class UserRepository {

    public function addUser (UserModel $user) :void {

        $username = $user->getUsername();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $salt = $user->getSalt();
        $password = $user->getPassword();

        $query = "INSERT INTO users (username, firstname, lastname, email, salt, password)
                                VALUES ('$username', '$firstName', '$lastName', '$email', '$salt', '$password');";
        MysqlConnection::getInstance()->query($query);
    }

    public function getUserById (int $id) :UserModel {
        $query  = "SELECT user_id, username, firstname, lastname, email FROM users WHERE user_id=".$id.";";
        $result = MysqlConnection::getInstance()->query($query)->fetchAll();

        $user = null;
        foreach ($result as $r) {
            $user = new UserModel ($r['user_id'], $r['username'], $r['firstname'],
                $r['lastname'], $r['email'], 'PROTECTED', 'PROTECTED');
        }

        return $user;
    }

    public function getUserByUsername(string $username) :?UserModel {
        $query  = "SELECT * FROM users WHERE username='".$username."';";
        $result = MysqlConnection::getInstance()->query($query)->fetchAll();

        if (count($result) !== 1) {
            return null;
        }

        $r = $result[0];

        return new UserModel ($r['user_id'], $r['username'], $r['firstname'], $r['lastname'], $r['email'], $r['salt'], $r['password']);
    }

    public function getUserByEmail(string $email) :?UserModel {
        $query  = "SELECT * FROM users WHERE email='".$email."';";
        $result = MysqlConnection::getInstance()->query($query)->fetchAll();

        if (count($result) !== 1) {
            return null;
        }

        $r = $result[0];
        return new UserModel ($r['user_id'], $r['username'], $r['firstname'], $r['lastname'], $r['email'], $r['salt'], $r['password']);
    }

    public function getAllUsers () :array {
        $query  = "SELECT user_id, username, firstname, lastname, email FROM users;";
        $result = MysqlConnection::getInstance()->query($query)->fetchAll();

        $array = [];
        foreach ($result as $r) {
            $array[] = new UserModel ($r['user_id'], $r['username'], $r['firstname'],
                $r['lastname'], $r['email'], 'PROTECTED', 'PROTECTED');
        }

        return $array;
    }

    public function removeUserById (string $id) :void {
        $query  = "DELETE FROM users WHERE user_id=".$id.";";
        MysqlConnection::getInstance()->query($query);
    }
}