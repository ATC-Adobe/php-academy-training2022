<?php
    declare(strict_types = 1);
    require './vendor/autoload.php';

    use Controller\Room\AddRoomController;
    use System\StatusHandler\Status;
    use System\Session\Session;

    $session = Session::getInstance();

    if ($session->get('user_id')) {
        if (isset($_POST['name']) && isset($_POST['floor'])) {
            (new AddRoomController())->request();
        }
    } else {
        $session->set('login', (string)Status::LOGIN_REQUIRED);
        header ('Location: ./login.php');
        die();
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
                    include_once "./src/Form/roomForm.php";
                ?>
            </div>
        </main>
        <?php
            include_once "./src/layout/footer.php";
        ?>
    </body>
</html>