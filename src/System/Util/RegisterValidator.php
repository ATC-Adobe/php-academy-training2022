<?php

namespace System\Util;

use Model\User\Repository\UserConcreteRepository;
use System\Status;

class RegisterValidator {
    public function validate(
        string $username, string $name, string $surname, string $email,
        string $password1, string $password2
    ) : int {
        if($username == '' || $name == '' || $surname == '' || $email == ''
            || $password1 == '' || $password2 == '') {
            return Status::REGISTER_FIELD_EMPTY;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return Status::REGISTER_EMAIL_INVALID;
        }

        $repo = new UserConcreteRepository();

        $u1 = $repo->getUserByUsername($username);
        $u2 = $repo->getUserByEmail($email);

        if($u1 !== null || $u2 !== null) {
            return Status::REGISTER_USERNAME_OR_EMAIL_TAKEN;
        }

        if($password2 !== $password1) {
            return Status::REGISTER_PASSWORD_NOT_MATCH;
        }

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@',      $password1);
        $lowercase = preg_match('@[a-z]@',      $password1);
        $number    = preg_match('@[0-9]@',      $password1);
        $specialChars = preg_match('@[^\w]@',   $password1);

        if(!$uppercase || !$lowercase || !$number
            || !$specialChars || strlen($password1) < 8) {
            return Status::REGISTER_PASSWORD_TOO_WEAK;
        }

        return Status::REGISTER_OK;
    }
}