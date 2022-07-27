<?php

namespace User;

class Session

{
    protected static $instance = null;
    protected string $nickname;

    private function __construct() {}
    protected function __clone(){}



    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new Session();
        }

        return self::$instance;
    }

    public function start()
    {
        session_start();
    }

    public function setData($nickname)
    {
        $this->data = $nickname;
    }

    public function getData()
    {
        return $this->data;
    }


}