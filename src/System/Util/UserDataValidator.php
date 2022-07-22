<?php

namespace System\Util;

use Model\User\Repository\UserConcreteRepository;
use System\Status;

class UserDataValidator {
    public function validate(
        $name, $surname, $email, $username,
    ) : int {

        if($username == '' || $name == '' || $surname == '' || $email == '') {
            return Status::REGISTER_FIELD_EMPTY;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return Status::REGISTER_EMAIL_INVALID;
        }

        $repo = new UserConcreteRepository();

        $auth = new Authenticator();

        if($auth->isLogged()) {
            $user = $auth->getUser();

            if($user->getNickname() !== $username) {
                if(null !== $repo->getUserByUsername($username)) {
                    return Status::REGISTER_USERNAME_OR_EMAIL_TAKEN;
                }
            }

            if($user->getEmail() !== $email) {
                if(null !== $repo->getUserByEmail($email)) {
                    return Status::REGISTER_USERNAME_OR_EMAIL_TAKEN;
                }
            }
        }
        else {
            $u1 = $repo->getUserByUsername($username);
            $u2 = $repo->getUserByEmail($email);

            if($u1 !== null || $u2 !== null) {
                return Status::REGISTER_USERNAME_OR_EMAIL_TAKEN;
            }
        }

        return Status::OK;
    }
}