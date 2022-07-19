<?php

namespace User\Model;

class UserModel {

    private int $id;
    private string $username;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $salt;
    private string $password;

    public function __construct (int $id, string $username, string $firstName, string $lastName, string $email, string $salt, string $password) {
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->salt = $salt;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}