<?php

namespace Model;

class User
{
    private $firstName;
    private $lastName;
    private $login;
    private $email;
    private $password;

    public function __construct($firstName, $lastName, $login, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}