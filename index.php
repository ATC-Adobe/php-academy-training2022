<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";

    use Controller\Room\DeleteRoomController;
    if ($session->get('user_id')) {
        if (isset($_POST['id'])) {
            (new DeleteRoomController())->request();
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