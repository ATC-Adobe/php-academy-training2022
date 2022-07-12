<?php

class Connection extends PDO
{
    protected static $instance = null;

    private const MYSQL_HOST = "mysql";
    private const MYSQL_USER = "app";
    private const MYSQL_PASSWORD = "qwerty";
    private const MYSQL_DBNAME = "app";

    private function __construct()
    {
        parent::__construct(
            "mysql:dbname=" . self::MYSQL_DBNAME . ";host=" . self::MYSQL_HOST,
            self::MYSQL_USER,
            self::MYSQL_PASSWORD
        );
    }

    protected function __clone() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

}
