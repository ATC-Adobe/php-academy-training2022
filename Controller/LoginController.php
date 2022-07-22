<?php

namespace Controller;

use Repository\LoginRepository;

class LoginController extends LoginRepository
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../Form/login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->login, $this->password);
    }

    private function emptyInput()
    {
        if (empty($this->login) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}