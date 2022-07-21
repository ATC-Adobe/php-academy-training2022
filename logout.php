<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";

    use Controller\User\LogoutController;

    if ($session->get('user_id')) {
        (new LogoutController())->request();
    } else {
        header ('Location: index.php?logout=false');
    }
