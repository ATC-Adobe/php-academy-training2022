<?php

namespace Repository;

class Session
{
    protected static $instance = null;
    protected string $nickname;
    protected string $password;
    //protected string $signature;

    private function __construct($nickname, $password)
    {

    }

    protected function __clone()
    {
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

//    /**
//     * @param string $signature
//     */
//    public function setSignature(string $signature): void
//    {
//        $this->signature = $signature;
//    }
//
//    /**
//     * @return string
//     */
//    public function getSignature(): string
//    {
//        return $this->signature;
//    }
//

    public static function getInstance($nickname, $password)
    {
        if (self::$instance === null) {
            self::$instance = new Session($nickname, $password);
        }

        return self::$instance;
    }

    public function start($nickname, $password)
    {
        session_start();
        $_SESSION['nickname'] = $nickname;
        $_SESSION['password'] = $password;
        $signature = md5($password . $_SERVER['HTTP_USER_AGENT']);
        $_SESSION['signature'] = $signature;
    }

}
