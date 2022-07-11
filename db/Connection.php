<?php

class Connection extends PDO
{
    protected static ?Connection $connection = null;

    protected const HOST = "mysql";
    protected const USER = "app";
    protected const PASSWORD = "qwerty";
    protected const DB = "app";

    protected function __construct()
    {
        parent::__construct(
            "mysql:dbname=" . self::DB . ";host=" . self::HOST,
            self::USER,
            self::PASSWORD
        );
    }
    public static function getConnection(): Connection
    {
        if(self::$connection === null){
            self::$connection = new Connection();
        }
        return self::$connection;
    }
}