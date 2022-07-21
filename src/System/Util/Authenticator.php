<?php

namespace System\Util;

use Model\User\Model\UserModel;
use Model\User\Repository\UserConcreteRepository;
use System\Status;

class Authenticator {

    const __SALT_LENGTH = 16;

    public function login(
        string $username, string $password
    ) : ?UserModel {

        $session = Session::getInstance();

        $repo = new UserConcreteRepository();
        $user = $repo->getUserByUsername($username);

        // if user not found return
        if($user === null) {
            return null;
        }

        // if hashed matches stored password, login successful
        if($this->passwordVerify($password, $user->getSalt(), $user->getPassword())) {

            $sess = Session::getInstance();

            $sess->set('valid',     true);

            $sess->set('username',  $user->getNickname());
            $sess->set('id',        $user->getId());
            $sess->set('password',  $user->getPassword());
            $sess->set('salt',      $user->getSalt());
            $sess->set('name',      $user->getName());
            $sess->set('surname',   $user->getSurname());
            $sess->set('email',     $user->getEmail());

            return $user;
        }

        // password fail
        return null;
    }

    public function register(
        string $username, string $name, string $surname, string $email,
        string $password1, string $password2
    ) : int {

        $validation =
            (new RegisterValidator())
                ->validate($username, $name, $surname,
                            $email, $password1, $password2);

        if($validation != Status::REGISTER_OK) {
            return $validation;
        }

        $salt = $this->generateSalt();
        $hash = $this->passwordHash($password1, $salt);

        $repo =  new UserConcreteRepository();

        $repo->addUser(
            new UserModel (
                0,
                $name,
                $surname,
                $email,
                $username,
                $salt,
                $hash
            )
        );

        return Status::REGISTER_OK;
    }

    public function logout() : void {

        $sess = Session::getInstance();
        $sess->destroy();
    }

    public function isLogged() : bool {

        $sess = Session::getInstance();

        return $sess->get('valid') !== null;
    }

    public function getUser() : ?UserModel {
        if(!$this->isLogged()) {
            return null;
        }

        $sess = Session::getInstance();

        return new UserModel(
            $sess->get('id'),
            $sess->get('name'),
            $sess->get('surname'),
            $sess->get('email'),
            $sess->get('username'),
            $sess->get('salt'),
            $sess->get('password'),
        );
    }

    private function passwordHash(string $password, string $salt) : string {

        return password_hash($salt . $password . $salt, PASSWORD_DEFAULT);
    }

    private function passwordVerify(string $password, string $salt, string $hash) : bool {

        return password_verify($salt . $password . $salt, $hash);
    }

    private function generateSalt() : string {

        return substr(str_shuffle(MD5(microtime())), 0, self::__SALT_LENGTH);
    }
}