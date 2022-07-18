<?php

namespace App\Controller;

use App\Model\User;
use App\Service\AuthenticatorService;
use App\View\RegisterForm;

class RegisterController
{
    public function create(string $msg = '', string $type = ""): void
    {
        (new RegisterForm())->render($msg, $type);
    }
    public function store() {

        $password = htmlentities($_POST["password"]);
        $repeat_password = htmlentities($_POST["repeat_password"]);
        if($password !== $repeat_password) {
            $this->create("passwords are different", "password");
            return false;
        }
        $user = new User();
        $user->first_name = htmlentities($_POST["first_name"]);
        $user->last_name = htmlentities($_POST["last_name"]);
        $user->email = htmlentities($_POST["email"]);
        $user->nickname = htmlentities($_POST["nickname"]);
        $user->password = $password;
        $auth = new AuthenticatorService();
        $currentUser = $auth->register($user);
        if(isset($currentUser["error"])) {
            if(str_contains($currentUser["msg"], "nickname")) {
                $this->create("nickname is already taken", "nickname");
                return false;
            }
            if(str_contains($currentUser["msg"], "email")) {
                $this->create("email is already taken", "email");
                return false;
            }
        }
        (new ReservationController())->index("User created successfully");
    }
}