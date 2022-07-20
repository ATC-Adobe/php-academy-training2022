<?php
namespace src\LogIn\Model;
use http\Exception\BadQueryStringException;

class LogInModel{

    public string $nickname;
    public string $password;

    public function __construct(string $nickname, string $password){

        $this->nickname = $nickname;
        $this->password = $password;
    }

    function set_nickname($nickname) {
        $this->nickname = $nickname;
    }

    function get_nickname() {
        return $this->nickname;
    }

    function set_password($password) {
        $this->password = $password;
    }
    function get_password() {
        return $this->password;
    }


}
