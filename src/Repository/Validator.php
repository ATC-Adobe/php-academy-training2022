<?php

namespace Repository;
use Exception;


class Validator
{
    protected string $email;

    public function __construct($email)
    {

    }

    public function checkEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Invalid email');
        }
    }


}