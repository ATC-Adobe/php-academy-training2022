<?php

namespace Authenticator;

use Session\Session;
use User\UserRepository;
use User\UserService;

class Authenticator
{
    public function register($firstName, $lastName, $nickName, $email, $password, $password2)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        $userRepository = new UserRepository();
        $nickNameCheck = $userRepository->getUserByNickName($nickName);
        $emailCheck = $userRepository->getUserByEmail($email);

        if ($password !== $password2) {
            $value = 'passwordsNotTheSame';
            $session = new Session();
            $session->set($value);
        } elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $value = 'passwordNotStrong';
            $session = new Session();
            $session->set($value);
        } elseif ($nickNameCheck === 'true' || $emailCheck === 'true') {
            $value = 'userNameOrEmail';
            $session = new Session();
            $session->set($value);
        } else {
            $newPass = $this->complicateThePassword($password);
            $userService = new UserService();
            $userService->createUser($firstName, $lastName, $nickName, $email, $newPass);
            header('Location:login.php');
        }
    }

    public function login($nickName, $password)
    {
        $userRepository = new UserRepository();
        $userNick = $userRepository->getUserByNickName($nickName);
        $userPassword = array_unique($userRepository->getUserPassword($nickName));

        $checkPass = password_verify($password, $userPassword['password']);

        if ($userNick === "true" && $checkPass == "true") {
            $value = 'correctLogin';
            $session = new Session();
            $session->set($value);
            $session->create($nickName);
        } else {
            $value = 'incorrectLogin';
            $session = new Session();
            $session->set($value);
        }
    }

    public function logOut()
    {
        $value = 'logout';
        $session = new Session();
        $session->set($value);
        $session->destroy();
    }

    private function complicateThePassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}