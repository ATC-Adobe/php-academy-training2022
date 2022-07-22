<?php

namespace Model\User\Service;

use Model\User\Repository\UserConcreteRepository;
use System\Status;
use System\Util\Authenticator;
use System\Util\UserDataValidator;

class UpdateUserDetailsService {
    public function updateUserDetails(
        string $name, string $surname, string $email, string $username
    ) :int {

        $data = (new UserDataValidator())
            ->validate(
                $name, $surname, $email, $username
            );

        if($data !== Status::OK) {
            return $data;
        }

        $repo = new UserConcreteRepository();

        $user = (new Authenticator())->getUser();

        $repo->changeAccuntDetails(
            $user,
            $name,
            $surname,
            $email,
            $username,
        );

        $auth = new Authenticator();
        $auth->updateSession();

        return Status::EDIT_USER_OK;
    }
}