<?php

namespace Controller;

use Service\Session;

class LogoutController
{
    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
        $sessionMsg = new Session();
        $sessionMsg->sessionMessage('logoutSuccess');
        header('location: ../index.php');

    }
}