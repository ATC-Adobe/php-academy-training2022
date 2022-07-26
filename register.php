<?php
    declare(strict_types = 1);
    require './vendor/autoload.php';

    use Controller\User\RegisterController;
    use System\Session\Session;

    $session = Session::getInstance();

    if (isset($_POST['username']) &&
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['email']) &&
        isset($_POST['password'])
    ) {
        (new RegisterController())->request();
    }

    require_once "./src/layout/head.php";
?>

    <body class="d-flex flex-column min-vh-100 bg-lightdark text-white" cz-shortcut-listen="true">
        <?php
            include_once "./src/layout/navbar.php";
        ?>
        <main class="main">
            <div class="container">
                <?php
                    include_once "./src/View/notifications.php";
                    include_once "./src/Form/registerForm.php";
                ?>
            </div>
        </main>
        <?php
            include_once "./src/layout/footer.php";
        ?>
    <script src='./src/layout/js/validator.js'></script>
    </body>
</html>