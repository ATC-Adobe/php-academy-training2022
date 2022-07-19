<?php

namespace Authenticator;

use Session\Session;
use User\UserRepository;
use User\UserService;

class Authenticator
{
    public function register($firstName, $lastName, $nickName, $email, $password, $password2)
    {
        if ($password === $password2) {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $value = 'passwordNotStrong';
                $session = new Session();
                $session->set($value);
                header('Location:../index.php');
            }

            $userRepository = new UserRepository();
            $nickNameCheck = $userRepository->getUserByNickName($nickName);
            $emailCheck = $userRepository->getUserByEmail($email);
        } else {
            header('Location:registration.php?passerror');
        }

        $newPass = $this->complicateThePassword($password);

        if ($nickNameCheck === 'false' && $emailCheck === 'false') {
            $userService = new UserService();
            $userService->createUser($firstName, $lastName, $nickName, $email, $newPass);
            header('Location:../index.php');
        } else {
            header('Location:registration.php?error');
        }
    }

    public function login($nickName, $password)
    {
        $userRepository = new UserRepository();
        $userNick = $userRepository->getUserByNickName($nickName);
        $userPassword = $userRepository->getUserPassword($nickName);

        foreach ($userPassword as $userPass) {
            $checkPass = password_verify($password, $userPass['password']);
        }

        if ($userNick === "true" && $checkPass == "true") {
            $session = new Session();
            $session->create($nickName);
            header('Location:myReservations.php?log');
        } else {
            header('Location:login.php?error');
        }
    }

    public function logOut()
    {
        $session = new Session();
        $session->destroy();
    }

    private function complicateThePassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}