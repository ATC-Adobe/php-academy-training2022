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

    /**
     * Constructs UserModel
     *
     * @param string $id
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $nickname
     * @param string $salt
     * @param string $password
     */
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

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname() : string {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail() : string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNickname() : string {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function getPassword() : string {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getSalt() : string {
        return $this->salt;
    }
}