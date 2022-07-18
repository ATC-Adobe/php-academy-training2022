<?php declare(strict_types = 1);

namespace System\Database;
use PDO;

class MySqlConnection extends PDO {

    protected static ?MySqlConnection $conn = null;

    protected static string $SERVERNAME = "mysql";
    protected static string $USERNAME   = "app";
    protected static string $PASSWORD   = "qwerty";
    protected static string $DBNAME     = "app";

    protected function __construct() {
        parent::__construct(
            "mysql:host=".self::$SERVERNAME.
            ";dbname=".self::$DBNAME,
            self::$USERNAME,
            self::$PASSWORD,
        );
    }

    /**
     * Gets singleton instance of MySqlConnection
     *
     * @return MySqlConnection
     */
    public static function getInstance() : MySqlConnection {
        if(self::$conn === null) {
            self::$conn = new MySqlConnection();
        }

        return self::$conn;
    }

}



