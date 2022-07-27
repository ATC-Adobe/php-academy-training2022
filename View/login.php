<?php

require_once "../vendor/autoload.php";

use Controllers\User\LoginUser;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = new LoginUser();
    $login->logInto();

    header('Location:myReservations.php');exit();
}

require_once "../layout/header.html";
require_once "../layout/navbar.php";

if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-danger message" role="alert">
        <?php
        echo $_SESSION['message']; ?>
    </div>
    <?php
    unset($_SESSION['message']);
endif;

require_once "../Form/loginForm.php";
require_once "../layout/footer.html";