<?php

    namespace System\Session;

    class Session implements SessionInterface {

        protected static ?Session $instance = null;

        protected function __construct () {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function getInstance (): Session {
            if (self::$instance === null) {
                self::$instance = new Session();
            }
            return self::$instance;
        }

        protected function __clone () { }

        public function get (string $key) :mixed {
            if (array_key_exists($key, $_SESSION)) {
                return $_SESSION[$key];
            }
            return null;
        }

        public function set (string $key, string $value) :SessionInterface {
            $_SESSION[$key] = $value;
            return $this;
        }

        public function destroy (string $key) :void {
            if (array_key_exists($key, $_SESSION)) {
                unset($_SESSION[$key]);
            }
        }

        public function clear () :void {
            session_unset();
        }
    }