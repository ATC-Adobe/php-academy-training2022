<?php

require_once "../autoloader.php";

use Controllers\User\LoginUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = new LoginUser();
    $login->logInto();
}

require_once "../layout/header.html";
require_once "../layout/navbar.php";
?>
<?php
if (isset($_GET['error'])) : ?>
    <p class="message">Podana Nazwa Użytkownika lub Hasło są nieprawidłowe</p>
<?php
elseif (isset($_GET['logout'])) : ?>
    <p class="message">Zostałeś pomyślnie wylogowany</p>
<?php
endif;

require_once "../Form/loginForm.php";
require_once "../layout/footer.html";
?>