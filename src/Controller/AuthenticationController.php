<?php

use Repository\Authentificator;
use Repository\Session;
use Repository\Validator;

require_once '../../autoloading.php';

if (count($_POST) > 0 && $_POST['authentication'] == 'registration'){
    $login = $_POST['nickname'];
    $authenticator = new Authentificator();
    $authenticator->register();

}

if (count($_POST) > 0 && $_POST['authentication'] == 'login'){
    $authenticator = new Authentificator();
    $authenticator->login();
}

if (count($_POST) > 0 && $_POST['authentication'] == 'logout'){
    $authenticator = new Authentificator();
    $authenticator->logout();
}

header('Location: http://localwsl.com/src/View/reservations.php');
