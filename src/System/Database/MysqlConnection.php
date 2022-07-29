<?php

    namespace System\Database;
    use PDO;

    class MysqlConnection extends PDO {

        protected static ?MysqlConnection $instance = null;

        //mysql, app, qwerty, app
        private const MYSQL_HOST        = "mysql";
        private const MYSQL_USER        = "app";
        private const MYSQL_PASSWORD    = "qwerty";
        private const MYSQL_DBNAME      = "app";

        protected function __construct () {
            parent::__construct (
                "mysql:dbname=" . self::MYSQL_DBNAME  . ";host=" . self::MYSQL_HOST,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
        }

        public static function getInstance (): MysqlConnection {
            if (self::$instance === null) {
                self::$instance = new MysqlConnection();
            }
            return self::$instance;
        }
    }