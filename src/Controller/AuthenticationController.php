<?php

use Repository\Authentificator;
use Repository\Session;
use Repository\Validator;
require_once '../../autoloading.php';

if (count($_POST) > 0 && $_POST['authentication'] == 'registration'){
    $login = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $validator = new Validator($email, $login, $password);


    if($validator->checkEmail($email) === false){
        $_SESSION['error_email'] = 'Email is not valid';
        header('Location: http://localwsl.com/src/Form/registration_form.php');
    }elseif ($validator->checkNickname($login) === false){
        $_SESSION['error_nickname'] = 'Nickname is not valid. It must be string and have at least 8 characters.';
        header('Location: http://localwsl.com/src/Form/registration_form.php');
    }elseif ($validator->checkPassword($password) === false){
        $_SESSION['error_password'] = 'Password is not valid. It must be string and have at least 8 characters.';
        header('Location: http://localwsl.com/src/Form/registration_form.php');
    }else{
        $authenticator = new Authentificator();
        $authenticator->register();
        header('Location: http://localwsl.com/');
    }

}

if (count($_POST) > 0 && $_POST['authentication'] == 'login'){
    $authenticator = new Authentificator();
    $authenticator->login();
    header('Location: http://localwsl.com/src/View/my_reservations.php');

}

if (count($_POST) > 0 && $_POST['authentication'] == 'logout'){
    $authenticator = new Authentificator();
    $authenticator->logout();
    header('Location: http://localwsl.com/index.php');

}

