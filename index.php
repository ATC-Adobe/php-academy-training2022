<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";

    use Controller\Room\DeleteRoomController;
    use System\StatusHandler\Status;

    if (isset($_POST['id'])) {
        if ($session->get('user_id')) {
            (new DeleteRoomController())->request();
        } else {
            $session->set('login', (string)Status::LOGIN_REQUIRED);
            header ('Location: ./login.php');
            die();
        }
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
                    include_once "./src/View/roomList.php";
                ?>
            </div>
        </main>
        <?php
            include_once "./src/layout/footer.php";
        ?>
    </body>
    </html>