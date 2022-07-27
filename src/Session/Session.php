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
                $_SESSION['message'] = "Wpisane hasło jest za słabe";
                break;
            case 'passwordsNotTheSame':
                $_SESSION['message'] = "Wpisane hasła nie są takie same";
                break;
            case 'userNameOrEmail':
                $_SESSION['message'] = "Nazwa użytkownika lub adres Email są już zarezerwowane";
                break;
            case 'correctLogin':
                $_SESSION['message'] = "Zostałeś pomyślnie zalogowany";
                break;
            case 'incorrectLogin':
                $_SESSION['message'] = "Podana Nazwa Użytkownika lub Hasło są nieprawidłowe";
                break;
            case 'logout':
                $_SESSION['message'] = "Zostałeś pomyślnie wylogowany";
                break;
            case 'roomsCollision':
                $_SESSION['message'] = "Ta sala jest już zarezerwowana w wybranym terminie";
                break;
            case 'reservationAdded':
                $_SESSION['message'] = "Sala została zarezerwowana";
                break;
            case 'reservationDeleted':
                $_SESSION['message'] = "Rezerwacja została usunięta";
                break;
            case 'roomAdded':
                $_SESSION['message'] = "Sala została dodana";
                break;
            case 'wrongDates':
                $_SESSION['message'] = "Wybrane dni są nieprawidłowe";
                break;
            case 'wrongHours':
                $_SESSION['message'] = "Wybrane godziny są nieprawidłowe";
                break;
            case 'unexpectedError':
                $_SESSION['message'] = "Nastąpił nieoczekiwany błąd. Proszę spróbować jeszcze raz";
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
        $_SESSION['username'] = $nickName;
    }

    public function destroy()
    {
        session_destroy();
    }
}