<?php

namespace System\Util;

use System\Status;

class PasswordValidator {
    public function validatePassword(string $password1, string $password2) : int {

        if($password2 == '' || $password1 == '') {
            return Status::REGISTER_FIELD_EMPTY;
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

        if($password1 !== $password2) {
            return Status::REGISTER_PASSWORD_NOT_MATCH;
        }

        return Status::OK;
    }
}