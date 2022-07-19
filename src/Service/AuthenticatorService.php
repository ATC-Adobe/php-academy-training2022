<?php

namespace App\Service;

use App\Controller\LoginController;
use App\Controller\RegisterController;
use App\Model\Session;
use App\Model\User;
use App\Repository\UserRepository;

class AuthenticatorService
{
    public function login(string $email, string $password): User|false
    {
        $user = (new UserRepository())->findByEmail($email);
        if(!$user) {
            return false;
        }
        if(!password_verify($password, $user->password)) {
            return false;
        }
        $this->setLoginSession($user);
        return $user;
    }
    public function register(User $user): User|bool|array
    {
        $userRepo = new UserRepository();
        $user->password = $this->hash($user->password);
        try {
            if(!$userRepo->save($user)) {
                return false;
            }
        } catch (\Exception $e) {
            return [
                "error" => true,
                "msg" => $e->errorInfo[2]
            ];
        }
        $user = $userRepo->findByEmail($user->email);
        $this->setLoginSession($user);
        return $user;
    }
    public function logout(): void
    {
        Session::getInstance()->delete();
    }
    protected function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param User $user
     * @return void
     */
    protected function setLoginSession(User $user): void
    {
        Session::getInstance()->set("user_id", $user->id);
        Session::getInstance()->set("nickname", $user->nickname);
    }
    public function isNotAuthRedirect(): void
    {
        if(!Session::getInstance()->get("user_id")) {
            //redirect and exit for not doubling website
            (new LoginController())->create("You need to be logged in!");
            exit();
        }
    }
}