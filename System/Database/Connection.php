<?php
declare(strict_types=1);
namespace System\Database;
use PDO;

class Connection extends PDO
{
    /**
     * @var Connection|null
     */
    protected static ?Connection $instance = null;
    protected const MYSQL_HOST = "mysql";
    protected const MYSQL_USER = "app";
    protected const MYSQL_PASSWORD = "qwerty";
    protected const MYSQL_SCHEMA = "app";
    protected function __construct()
    {
        parent::__construct(
            "mysql:dbname=" . self::MYSQL_SCHEMA . ";host=" . self::MYSQL_HOST,
            self::MYSQL_USER,
            self::MYSQL_PASSWORD
        );
    }
    /**
     * @return Connection
     */
    public static function getInstance(): Connection
    {
        if(self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }
}
