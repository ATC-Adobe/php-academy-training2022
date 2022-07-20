<?php
namespace src\Registration\Repository;
require 'autoloading.php';
require_once 'src/Registration/Model/RegistrationModel.php';
use src\Registration\Model\RegistrationModel;
use System\Database\Connection;


class RegistrationRepository extends RegistrationModel {
//    public function __construct(){}
    public function saveRegistration(){
        Connection::getInstance()
            ->query("INSERT INTO user
                    (username, surname, email , nickname, password)
                    VALUES
                        (
                         '$this->name',
                         '$this->surname',
                         '$this->email',
                         '$this->nickname',
                         '$this->password'
                        );"
            );

    }


}