<?php

namespace User;

class UserService
{
    public function createUser($firstName, $lastName, $nickName, $email, $newPass)
    {
        $userModel = new UserModel();
        $userModel->sendUserDataToModel($firstName, $lastName, $nickName, $email, $newPass);

        $registrationRepository = new UserRepository();
        $registrationRepository->addUser($userModel);
    }
}