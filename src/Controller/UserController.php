<?php

namespace App\Controller;

use App\Model\Session;
use App\Model\User;
use App\Repository\UserRepository;
use App\Service\AuthenticatorService;
use App\Service\ReservationService;
use App\View\ProfileEdit;
use App\View\ProfilePage;

class UserController
{
    public function show(string $alertMsg ="",  string $type="danger"): void
    {
        $auth = new AuthenticatorService();
        $auth->isNotAuthRedirect();
        $user = $auth->findOne(Session::getInstance()->get("user_id"));
        if (!$user) {
            (new ReservationController())->index("Something went wrong!");
            return;
        }
        $data = (new ReservationService())->findUsersReservations($user->id);
        $howMany = count($data);
        (new ProfilePage($user, $howMany, $alertMsg, $type))->render();
    }

    public function edit(string $msg = "", string $type = ""): void
    {
        $auth = new AuthenticatorService();
        $auth->isNotAuthRedirect();
        $user = $auth->findOne(Session::getInstance()->get("user_id"));
        if (!$user) {
            (new ReservationController())->index("Something went wrong!");
            return;
        }
        (new ProfileEdit($user))->render($msg, $type);
    }

    public function update(): void
    {
        $auth = new AuthenticatorService();
        $auth->isNotAuthRedirect();

        $repo = new UserRepository();
        $user = $repo->findOne(Session::getInstance()->get("user_id"));
        $user->email = htmlentities($_POST["email"] ?? $user->email);
        $user->nickname = htmlentities($_POST["nickname"] ?? $user->nickname);
        $user->first_name = htmlentities($_POST["first_name"] ?? $user->first_name);
        $user->last_name = htmlentities($_POST["last_name"] ?? $user->last_name);

        //hashed password is passed, but it will always be valid
        $valid = $auth->validateCredentials($user);
        if($valid !== true) {
            $this->edit($valid["msg"], $valid["type"]);
        }


        try {
            if(!$repo->updateOne($user)) {
                (new ReservationController())->index("Something went wrong!");
            }
            $this->show("Successfully changed credentials", "success");
        } catch (\Exception $e) {
            $msg = $e->errorInfo[2];
            if(str_contains($msg, "nickname")) {
                $this->edit("The nickname is already taken", "nickname");
                return;
            }
            if(str_contains($msg, "email")) {
                $this->edit("The email is already taken", "email");
                return;
            }
        }

    }
}