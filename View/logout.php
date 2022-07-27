<?php

require_once "../vendor/autoload.php";

session_start();

use Controllers\User\LoginUser;
use Session\Session;

$login = new LoginUser();
$login->logOut();

$session = new Session();
session_start();
$session->set('logout');

header('Location:login.php');
exit();