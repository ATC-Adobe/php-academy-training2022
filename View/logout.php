<?php

require_once "../autoloader.php";

session_start();

use Controllers\User\LoginUser;

$login = new LoginUser();
$login->logOut();

header('Location:login.php?logout');