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
$validator->checkNicknameUnique($login);

    if($validator->checkEmail($email) === false){
        session_start();
        $_SESSION['error_email'] = 'Email is not valid';
        header('Location: http://localwsl.com/src/Form/registration_form.php');
    }
    if ($validator->checkNickname($login) === false){
        session_start();
        $_SESSION['error_nickname'] = 'Nickname is not valid. It must be string and have at least 8 characters.';
        header('Location: http://localwsl.com/src/Form/registration_form.php');
    }
    if ($validator->checkPassword($password) === false){
        session_start();
        $_SESSION['error_password'] = 'Password is not valid. It must be string and have at least 8 characters.';
        header('Location: http://localwsl.com/src/Form/registration_form.php');
    }
    if($validator->checkEmail($email) === true && $validator->checkNickname($login) === true && $validator->checkPassword($password) === true){
        $authenticator = new Authentificator();
        $authenticator->register();
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

