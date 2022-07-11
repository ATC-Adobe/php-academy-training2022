<?php

class Connection extends PDO
{
    private static ?Connection $instance = null;

    protected string $dsn = "mysql:dbname=app;host=localwsl.com";
    protected string $username ="app";
    protected string $password="qwerty";

    private function __construct()
    {
        parent::__construct($this->dsn, $this->username, $this->password);
    }

    public static function getInstance(): Connection {
        if(self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }
}