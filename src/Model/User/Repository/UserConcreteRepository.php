<?php

namespace Model\User\Repository;

use Model\User\Model\UserModel;
use System\Database\MySqlConnection;

class UserConcreteRepository {

    /**
     *
     */
    public function __construct() {

    }

    /**
     * Gets all users
     *
     * @return array<\Model\User\Model\UserModel>
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
     * @param \Model\User\Model\UserModel $user
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

    public function changePassword(
        UserModel $user, string $newPassword, string $newSalt
    ) : void {

        $id = $user->getId();

        $stmt = MySqlConnection::getInstance()->prepare(
            "UPDATE Users SET password = :password, salt = :salt WHERE id = :id"
        );


        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':salt', $newSalt);

        $stmt->execute();
    }

    public function changeAccuntDetails(
        UserModel $user, string $name, string $surname, string $email, string $username
    ) {

        $id = $user->getId();

        $stmt = MySqlConnection::getInstance()->prepare(
            "UPDATE Users SET 
                 name = :name, 
                 surname = :surname,
                 email = :email,
                 nickname = :username
             WHERE id = :id"
        );

        $stmt->bindParam(':id',         $id);
        $stmt->bindParam(':name',       $name);
        $stmt->bindParam(':surname',    $surname);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':username',   $username);

        $stmt->execute();
    }
}