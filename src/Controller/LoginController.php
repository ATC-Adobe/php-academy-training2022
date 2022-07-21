<?php

namespace App\Controller;

use App\Model\Session;
use App\Service\AuthenticatorService;
use App\Service\ReservationService;
use App\View\ProfilePage;

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
    public function show(): void {
        $user = (new AuthenticatorService())->findOne(Session::getInstance()->get("user_id"));
        if(!$user) {
            (new ReservationController())->index("Something went wrong!");
            return;
        }
        $data = (new ReservationService())->findUsersReservations($user->id);
        $howMany = count($data);
        (new ProfilePage($user, $howMany))->render();
    }
    public function logout(): void
    {
        (new AuthenticatorService())->logout();
        (new RoomController())->index();
    }
}