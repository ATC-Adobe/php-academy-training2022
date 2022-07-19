<?php

namespace Controllers\User;

use Authenticator\Authenticator;
use Session\Session;

class RegistrationUser
{
    public function getUserData(): void
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $nickName = $_POST['nickName'];
        $email = $_POST['email'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];

        $authenticator = new Authenticator();
        $authenticator->register($firstName, $lastName, $nickName, $email, $password, $password2);
    }
}