<?php

namespace System\Util;

use Model\User\Repository\UserConcreteRepository;
use System\Status;

class RegisterValidator {
    public function validate(
        string $username, string $name, string $surname, string $email,
        string $password1, string $password2
    ) : int {

        $data = (new UserDataValidator())
            ->validate($name, $surname, $email, $username);

        if($data !== Status::OK) {
            return $data;
        }

        $pass = (new PasswordValidator())
            ->validatePassword($password1, $password2);

        if($pass !== Status::OK) {
            return $pass;
        }

        return Status::REGISTER_OK;
    }
}