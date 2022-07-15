<?php

namespace User\Model;

class UserModel {
    private int $id;

    private string $name;
    private string $surname;
    private string $email;

    private string $nickname;

    private string $salt;
    private string $password;

    public function __construct(
        string $id, string $name, string $surname,
        string $email, string $nickname, string $salt,
        string $password
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->salt = $salt;
        $this->password = $password;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getSurname() : string {
        return $this->surname;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getNickname() : string {
        return $this->nickname;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function getSalt() : string {
        return $this->salt;
    }
}