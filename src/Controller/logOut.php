<?php

include("../../autoloading.php");
use User\Authenticator;

$logout = new Authenticator;
$logout->logout();

include("../../layout/navbar.php");


echo '<h1>You have been logged out!</h1>';