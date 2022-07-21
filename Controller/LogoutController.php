<?php

namespace Controller;

class LogoutController
{
    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: ../index.php?logout=success');
    }
}