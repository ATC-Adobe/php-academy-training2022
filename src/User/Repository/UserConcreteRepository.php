<?php

namespace User\Repository;

use http\Client\Curl\User;
use System\Database\MySqlConnection;
use User\Model\UserModel;

class UserConcreteRepository {

    /**
     *
     */
    public function __construct() {

    }

    /**
     * Gets all users
     *
     * @return array<UserModel>
     */
    public function getAllUsers() : array {
        $res =
            MySqlConnection::getInstance()
            ->query("SELECT * FROM Users");

        $users = [];

        foreach( $res as $entry ) {
            $users[] =
                new UserModel(
                    $entry['id'],
                    $entry['name'],
                    $entry['surname'],
                    $entry['email'],
                    $entry['nickname'],
                    $entry['salt'],
                    $entry['password']
                );
        }

        return $users;
    }

    /**
     * Gets user with given id if exists
     *
     * @param int $id
     * @return UserModel|null
     */
    public function getUserById(int $id) : ?UserModel {
        $res =
            MySqlConnection::getInstance()
            ->query("SELECT * FROM Users WHERE id = '$id'")
            ->fetchAll();

        if(count($res) != 1) {
            return null;
        }

        $entry = $res[0];

        return new UserModel(
            $entry['id'],
            $entry['name'],
            $entry['surname'],
            $entry['email'],
            $entry['nickname'],
            $entry['salt'],
            $entry['password']
        );

    }

    public function getUserByUsername(string $username) : ?UserModel {

        $stmt =
            MySqlConnection::getInstance()
            ->prepare('SELECT * FROM Users WHERE nickname = :username');

        $stmt->bindParam(':username', $username);

        $stmt->execute();
        $res = $stmt->fetchAll();

        if(count($res) != 1) {
            return null;
        }

        $entry = $res[0];

        return new UserModel(
            $entry['id'],
            $entry['name'],
            $entry['surname'],
            $entry['email'],
            $entry['nickname'],
            $entry['salt'],
            $entry['password']
        );
    }

    public function getUserByEmail(string $email) : ?UserModel {

        $stmt =
            MySqlConnection::getInstance()
                ->prepare('SELECT * FROM Users WHERE email = :email');

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $res = $stmt->fetchAll();

        if(count($res) != 1) {
            return null;
        }

        $entry = $res[0];

        return new UserModel(
            $entry['id'],
            $entry['name'],
            $entry['surname'],
            $entry['email'],
            $entry['nickname'],
            $entry['salt'],
            $entry['password']
        );
    }

    /**
     * Inserts user into database
     *
     * @param UserModel $user
     * @return void
     */
    public function addUser(UserModel $user) : void {
        $stmt = MySqlConnection::getInstance()
            ->prepare("INSERT INTO Users(name, surname, email, nickname, password, salt)
                VALUES (
                        :name,
                        :surname,
                        :email,
                        :nickname,
                        :password,
                        :salt
                );");

        $name =     $user->getName();
        $surname =  $user->getSurname();
        $email =    $user->getEmail();
        $nickname = $user->getNickname();
        $password = $user->getPassword();
        $salt =     $user->getSalt();

        $stmt->bindParam(':name',       $name);
        $stmt->bindParam(':surname',    $surname);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':nickname',   $nickname);
        $stmt->bindParam(':password',   $password);
        $stmt->bindParam(':salt',       $salt);
        /*
        MySqlConnection::getInstance()
            ->query("
                INSERT INTO Users(name, surname, email, nickname, password, salt)
                VALUES (
                    '$name',
                    '$surname',
                    '$email',
                    '$nickname',
                    '$password',
                    '$salt'
                );");*/

        $stmt->execute();
    }
}