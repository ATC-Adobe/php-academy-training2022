<?php

namespace Session;

class Session
{
    public function get()
    {
        if (isset($_SESSION['username'])) {
            return 'true';
        }
    }

    public function set($value)
    {
        switch ($value) {
            case 'passwordNotStrong':
                $_SESSION['message'] = "Wpisane hasło nie jest wsytarczająco silne";
                break;
            default:
                echo 'Nastąpił nieoczekiwany błąd. Proszę spróbować jeszcze raz';
                break;
        }
    }

    public function display()
    {
        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        }
    }

    public function create($nickName)
    {
        session_start();
        $_SESSION['username'] = $nickName;
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
    }
}