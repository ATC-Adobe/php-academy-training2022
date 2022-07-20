<?php
require_once 'autoloading.php';
use Controller\Authenticator;
require_once 'src/Registration/Model/RegistrationModel.php';
require_once 'src/LogIn/Model/LogInModel.php';
require_once 'src/LogIn/Repository/LogInRepository.php';
require_once 'Controller/Authenticator.php';
require_once 'System/Database/Connection.php';
include_once 'Controller/Logout.php';

    Authenticator::logIn();
include_once 'layout/navbar.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

<div class="container">
    <form class="bg-dark text-light" method="post" action="login.php">
        <label for="nickname">Nickname:</label>
        <input type="text" id="nickname"  name="nickname"><br>
        <label for="password">Password:</label>
        <input type="password" id="password"  name="password"><br>
        <input type="submit" name="login" value="Login">
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>