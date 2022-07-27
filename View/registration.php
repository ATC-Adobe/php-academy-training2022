<?php

require_once "../vendor/autoload.php";

session_start();

use Controllers\User\RegistrationUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registrationUser = new RegistrationUser();
    $registrationUser->getUserData();
}

require_once "../layout/header.html";
require_once "../layout/navbar.php";
?>

<?php

if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-danger message" role="alert">
        <?php
        echo $_SESSION['message']; ?>
    </div>
    <?php
    unset($_SESSION['message']);
endif;

require_once "../Form/registrationForm.php";
require_once "../layout/footer.html";