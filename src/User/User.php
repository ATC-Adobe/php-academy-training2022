<?php

namespace User;

class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $nickname;
    private string $password;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSurname($surname)
    {
    $this->surname = $surname;
    }

    public function getSurname()
    {
    return $this->surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

}