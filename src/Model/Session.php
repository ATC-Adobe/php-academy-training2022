<?php

namespace App\Model;

class Session
{
    private static ?Session $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): Session
    {
        if (self::$instance === null) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function get(string $key)
    {
            return $_SESSION[$key] ?? null;
    }

    public function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function start(): void
    {
        session_start();
    }

    public function commit(): void
    {
        session_commit();
    }
    public function unset(): void
    {
        session_unset();
    }
}