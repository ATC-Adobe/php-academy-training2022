<?php

namespace Controllers\User;

use Authenticator\Authenticator;
use User\UserRepository;

class LoginUser
{
    public function logInto(): void
    {
        $nickName = $_POST['nickName'];
        $password = $_POST['password'];

        $authenticator = new Authenticator();
        $authenticator->login($nickName, $password);
    }

    public function logOut()
    {
        $authenticator = new Authenticator();
        $authenticator->logOut();
    }

    public function getUserId($nickName)
    {
        $userRepository = new UserRepository();
        return $userRepository->getUserId($nickName);
    }
}