<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";

    use Controller\User\LogoutController;
    session_start();

    if (isset($_SESSION['username'])) {
        (new LogoutController())->request();
    } else {
        header ('Location: index.php?logout=false');
    }
