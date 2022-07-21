<?php

namespace src\LogIn\Repository;

class Session
{
    protected int $userID;
    protected static $instance = null;
    protected string $nickname;
    protected string $password;
    protected string $username;
    protected string $surname;
    protected string $email;

    public function set_userID($userID)
    {
        $this->userID = $userID;
    }

    public function get_userID()
    {
        return $this->userID;
    }
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Session();
        }

        return self::$instance;
    }


    public function start($nickname, $password , $userID)
    {
        session_start();
        $_SESSION['nickname'] = $nickname;
        $_SESSION['password'] = $password;
        $_SESSION['userID'] = $userID;
    }

    public static function sessionDestroy(){
        session_start();
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

}