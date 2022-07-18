<?php

namespace System\Util;

use Couchbase\User;
use User\Model\UserModel;
use User\Repository\UserConcreteRepository;

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

        // hash password
        $hash = $this->passwordHash(
            $password,
            $user->getSalt()
        );

        // if hashed matches stored password, login successful
        if($hash === $user->getPassword()) {
            return $user;
        }

        // password fail
        return null;
    }

    // error codes
    public const REGISTER_OK = 0;
    public const FIELD_EMPTY = 1;
    public const USERNAME_OR_EMAIL_TAKEN = 2;
    public const EMAIL_INVALID = 3;
    public const PASSWORD_NOT_MATCH = 4;
    public const PASSWORD_TOO_WEAK = 5;

    public function register(
        string $username, string $name, string $surname, string $email,
        string $password1, string $password2
    ) : int {

        if($username == '' || $name == '' || $surname == '' || $email == ''
                || $password1 == '' || $password2 == '') {
            return self::FIELD_EMPTY;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return self::EMAIL_INVALID;
        }

        $repo = new UserConcreteRepository();

        $u1 = $repo->getUserByUsername($username);
        $u2 = $repo->getUserByEmail($email);

        if($u1 !== null || $u2 !== null) {
            return self::USERNAME_OR_EMAIL_TAKEN;
        }

        if($password2 !== $password1) {
            return self::PASSWORD_NOT_MATCH;
        }

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@',      $password1);
        $lowercase = preg_match('@[a-z]@',      $password1);
        $number    = preg_match('@[0-9]@',      $password1);
        $specialChars = preg_match('@[^\w]@',   $password1);

        if(!$uppercase || !$lowercase || !$number
            || !$specialChars || strlen($password1) < 8) {
            return self::PASSWORD_TOO_WEAK;
        }

        $salt = $this->generateSalt();
        $hash = $this->passwordHash($password1, $salt);

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

        return self::REGISTER_OK;
    }

    public function logout() : void {

    }


    // due to some unholy bug, hashing is temporarily disabled
    private function passwordHash(string $password, string $salt) : string {

        //return password_hash(/*$salt . */$password/* . $salt*/, PASSWORD_DEFAULT);
        return $password;
    }

    private function generateSalt() : string {

        return substr(str_shuffle(MD5(microtime())), 0, self::__SALT_LENGTH);
    }
}