<?php

namespace Controller;

use Repository\RegisterFormValidation;
use Repository\RegisterRepository;
use Service\ApplicationService;
use Service\Session;

class RegisterController extends RegisterRepository
{
    private $firstName;
    private $lastName;
    private $login;
    private $email;
    private $password;
    private $passwordConfirm;

    public function __construct($firstName, $lastName, $login, $email, $password, $passwordConfirm)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
    }

    public function registerUser($error, $firstName, $lastName, $login, $email, $password, $passwordConfirm): array
    {
        $sessionMsg = new Session();
        if (isset($_POST['submit'])) {
            [$error, $firstName, $lastName, $login, $email, $password, $passwordConfirm] = (new RegisterFormValidation(
                $firstName, $lastName, $login, $email, $password, $passwordConfirm
            ))->validated(
                $error,
                $firstName,
                $lastName,
                $login,
                $email,
                $password,
                $passwordConfirm
            );
            if ($error == '') {
                $this->setUser($this->firstName, $this->lastName, $this->login, $this->email, $this->password);

                (new ApplicationService())->getRegisterHeader();
                exit();
            }
        }
        return array($error, $firstName, $lastName, $login, $email, $password, $passwordConfirm);
    }
}