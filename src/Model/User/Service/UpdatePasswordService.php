<?php

namespace Model\User\Service;

use Model\User\Repository\UserConcreteRepository;
use System\Status;
use System\Util\Authenticator;
use System\Util\PasswordValidator;

class UpdatePasswordService {
    public function updatePassword(string $oldPass, string $newPass1, string $newPass2) : int {
        $auth = new Authenticator();

        if(!$auth->validateLoggedUser($oldPass)) {
            return Status::EDIT_PASS_REQ;
        }

        $pass = (new PasswordValidator())
            ->validatePassword($newPass1, $newPass2);

        if($pass != Status::OK) {
            return $pass;
        }

        $auth->updatePassword(
            $newPass1
        );

        $auth->updateSession();


        return Status::EDIT_PASS_SUCCESS;
    }
}