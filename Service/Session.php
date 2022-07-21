<?php

namespace Service;

class Session
{
    public function checkSession()
    {
        if (isset($_SESSION['userid'])) {
            return true;
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
                $_SESSION['success'] = 'You are logged in as: ' . $_SESSION['userlogin'];
                break;
            case 'logoutSuccess';
                $_SESSION['success'] = 'You are logged out';
                break;
            case 'reservationCreated';
                $_SESSION['success'] = $_SESSION['userlogin'] . ' New reservation is confirmed.';
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
        }
    }
}