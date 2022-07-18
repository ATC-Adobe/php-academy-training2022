<?php

namespace System\Util;

class Session {

    private static ?Session $instance = null;

    private function __construct() { }

    public static function getInstance() : Session {

        return self::$instance ??= new Session();
    }

    private function start() : void {

    }

    public function create() : void {
        if (!$this->isOpen()) {
            session_write_close();
            session_start();
            session_regenerate_id(true);
        }
    }


    public function destroy() : void {

        session_unset();
        session_destroy();
    }

    public function isOpen() : bool {
        return session_status() !== PHP_SESSION_NONE;
    }

    public function isValid() : bool {
        return isset($_SESSION['valid']);
    }

    public function set(string $key, string $value) : void {
        if($this->isOpen()) {
            $_SESSION[$key] = $value;
        }
    }

    public function get(string $key) : mixed {
        if($this->isOpen() && isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    function __destruct() {
        //session_commit();
    }
}