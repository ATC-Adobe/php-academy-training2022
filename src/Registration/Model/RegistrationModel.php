<?php
namespace src\Registration\Model;
use http\Exception\BadQueryStringException;

class RegistrationModel{

    public string $name;
    public string $surname;
    public string $email;
    public string $nickname;
    public string $password;

    public function __construct(string $name, string $surname, string $email, string $nickname, string $password){
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->password = $password;
    }


    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }

    function set_surname($surname) {
        $this->surname = $surname;
    }
    function get_surname() {
        return $this->surname;
    }

    function set_email($email) {
        $this->email = $email;
    }
    function get_email() {
        return $this->email;
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
