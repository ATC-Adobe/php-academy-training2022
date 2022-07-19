<?php

namespace User;

class UserModel
{
    protected string $firstName;
    protected string $lastName;
    protected string $nickName;
    protected string $email;
    protected string $password;

    public function sendUserDataToModel($firstName, $lastName, $nickName, $email, $newPass)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->nickName = $nickName;
        $this->email = $email;
        $this->password = $newPass;
    }

    public function setFirstName(string $firstName): string
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): string
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setNickName(string $nickName): string
    {
        $this->nickName = $nickName;
        return $this;
    }

    public function setEmail(string $email): string
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword1(string $password): string
    {
        $this->password = $password;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getNickName(): string
    {
        return $this->nickName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}