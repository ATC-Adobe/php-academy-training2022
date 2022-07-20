<?php

namespace Controller;

use Repository\RegisterRepository;

class RegisterController extends RegisterRepository
{
    private $firstName;
    private $lastName;
    private $login;
    private $email;
    private $password;
    private $passwordConfirm;

    public function __construct($firstName, $lastName, $login, $email, $password, $passwordConfirm)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            //echo "Empty input"
            //header("location: ../Form/register.php?error=emptyinput");
            exit();
        }
        $this->setUser($this->firstName, $this->lastName, $this->login, $this->email, $this->password);
    }

    private function emptyInput()
    {
        if (empty($this->firstName) || empty($this->lastName) || empty($this->login) || empty($this->email) || empty($this->password) || empty($this->passwordConfirm)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidLogin()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->login)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch()
    {
        if ($this->password !== $this->passwordConfirm) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function userMatch()
    {
        if (!$this->checkUser($this->login, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}