<?php

    namespace System\Session;

    class Session implements SessionInterface {

        private static ?Session $instance = null;

        protected function __construct () {
            if (session_status() === PHP_SESSION_NONE) {
                session_write_close();
                session_start();
            }
        }

        public static function getInstance () :Session {
            return self::$instance ??= new Session();
        }

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

        public function unset (string $key) :void {
            if (array_key_exists($key, $_SESSION)) {
                unset($_SESSION[$key]);
            }
        }

        public function destroy () :void {
            session_unset();
            session_destroy();
        }
    }