<?php

session_start();

include("../../autoloading.php");

use User\Authenticator;
//use User\Session;


$newRegistration = new Authenticator;
$isSessionStart = $newRegistration->register();

include("../../layout/navbar.php");

if(isset($_SESSION)){
echo '<h1>Thank You for Your registration!</h1>';}

if($isSessionStart === 1)
{
    echo "<h1>You have to change your nickname!<h1>";
}


