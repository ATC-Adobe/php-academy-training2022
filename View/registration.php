<?php

require_once "../autoloader.php";

use Controllers\User\RegistrationUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registrationUser = new RegistrationUser();
    $registrationUser->getUserData();
}

require_once "../layout/header.html";
require_once "../layout/navbar.php";
?>

<?php
if (isset($_GET['error'])) : ?>
    <p class="message">Nazwa użytkownika lub adres Email są już zarezerwowane</p>
<?php
endif;
if (isset($_GET['passerror'])) : ?>
    <p class="message">Wpisane hasła nie są takie same</p>
<?php
endif;
if (isset($_GET['roomerror'])) : ?>
    <p class="message">Ta sala jest już zarezerwowana w wybranym terminie</p>
<?php
endif; ?>

<?php
require_once "../Form/registrationForm.php";
require_once "../layout/footer.html";
?>