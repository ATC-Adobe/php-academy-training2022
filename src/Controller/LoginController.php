<?php

namespace App\Controller;

use App\Service\AuthenticatorService;

class LoginController
{
    public function create($msg = "", $alertMsg = "", $alertType = "danger"): void
    {
        (new \App\View\LoginForm($alertMsg, $alertType))->render($msg);
    }
    public function store(): void
    {
        $password = htmlentities($_POST["password"]);
        $email = htmlentities($_POST["email"]);

        $auth = new AuthenticatorService();
        if(!$auth->login($email, $password)) {
            $this->create("Email or password is incorrect");
            return;
        }

        (new RoomController())->index();
    }

    public function logout(): void
    {
        (new AuthenticatorService())->logout();
        (new RoomController())->index();
    }
}