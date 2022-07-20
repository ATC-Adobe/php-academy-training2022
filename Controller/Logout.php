<?php
require_once 'autoloading.php';
include_once 'System/Database/Connection.php';
include_once 'src/LogIn/Repository/Session.php';
use Controller\Authenticator;
include_once 'Controller/Authenticator.php';

if(isset($_POST['logout'])){
    Authenticator::logOut();
}


?>