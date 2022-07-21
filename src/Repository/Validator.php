<?php

namespace Repository;

use Exception;


class Validator
{
    protected string $email;
    protected string $nickname;
    protected string $password;

    public function __construct($email, $nickname, $password)
    {

    }

    public function checkEmail($email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    public function checkNickname($nickname): bool
    {
        if(!isset($nickname) || !is_string($nickname) || $nickname < 8){
            return false;
        }else{
            return true;
        }
    }

    public function checkPassword($password): bool
    {
        if(!isset($password) || !is_string($password) || $password < 8){
            return false;
        }else{
            return true;
        }
    }


}