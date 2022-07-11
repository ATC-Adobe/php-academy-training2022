<?php

declare(strict_types=1);

class MysqlConnection extends PDO
{
    protected static ?MysqlConnection $instance = null;

    protected const MYSQL_HOST = 'mysql';
    protected const MYSQL_USER = 'app';
    protected const MYSQL_PASSWORD = 'qwerty';
    protected const MYSQL_SCHEMA = 'app';

    protected function __construct()
    {
        parent::__construct(
            "mysql:dbname=" . self::MYSQL_SCHEMA . ";host=" . self::MYSQL_HOST,
            self::MYSQL_USER,
            self::MYSQL_PASSWORD
        );
    }

    protected function __clone () { }

    public static function getInstance(): MysqlConnection
    {
        if (self::$instance === null) {
            self::$instance = new MysqlConnection();
        }
        return self::$instance;
    }
}