<?php

namespace Repository;
use MongoDB\Driver\Exception\EncryptionException;


class Validator
{
    protected string $login;

    public function __construct($login)
    {
        if(strlen($login) > 7){
            $this->login = $login;
        }else{
            throw new EncryptionException('Nickname is too short');
        }
    }

}