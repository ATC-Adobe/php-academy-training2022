<?php

namespace Service;

class Session
{
    public function checkSession()
    {
        if (isset($_SESSION['userId'])) {
            return true;
        }
        return false;
    }

    public function authorization(): void
    {
        $sessionCheck = new Session();
        if (!$sessionCheck->checkSession()) {
            $sessionCheck->sessionMessage('needLogin');
            (new ApplicationService())->getLoginHeader();
            exit();
        }
    }

    public function sessionMessage($msg)
    {
        switch ($msg) {
            case 'error';
                $_SESSION['error'] = 'Error occurs. Try again or contact with admin';
                break;
            case 'wrongPassword';
                $_SESSION['error'] = 'Wrong password!';
                break;
            case 'wrongLogin';
                $_SESSION['error'] = 'User not found!';
                break;
            case 'loginSuccess';
                $_SESSION['success'] = 'You are logged in as: ' . $_SESSION['userLogin'].' '.$_SESSION['userFirstName'].' '.$_SESSION['userLastName'];
                break;
            case 'logoutSuccess';
                $_SESSION['success'] = 'You are logged out';
                break;
            case 'reservationCreated';
                $_SESSION['success'] = $_SESSION['userLogin'] . ' New reservation is confirmed.';
                break;
            case 'reservationDeleted';
                $_SESSION['warning'] = 'Reservation deleted.';
                break;
            case 'roomCreated';
                $_SESSION['success'] = 'New room created.';
                break;
            case 'roomDeleted';
                $_SESSION['warning'] = 'Room deleted.';
                break;
            case 'needLogin';
                $_SESSION['error'] = 'You have to login or signup to get acceess.';
                break;
            case 'accountCreated';
                $_SESSION['success'] = 'New account has been created';
                break;
        }
    }
}