<?php

include("../../autoloading.php");

use User\Authenticator;
use User\Session;
use User\UserRepository;


$newLogin = new Authenticator;
$isSessionStart = $newLogin->login();

include("../../layout/navbar.php");

if(isset($_SESSION)){
    $session = Session::getInstance();
    echo '<h1>Hi '.$session->getData().'</h1>';
    $_SESSION['nickname'] = $session->getData();
    $userId = new UserRepository;
    $_SESSION['user_id'] = $userId->getUserId($_SESSION['nickname']);
    echo($_SESSION['user_id']);}

if($isSessionStart === 1)
{
    echo "<h1>You wrote wrong data!<h1>";
}

//header('Location: http://localwsl.com/src/View/loginView.php');