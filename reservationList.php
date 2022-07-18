<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";
    session_start();
    include_once "./src/View/reservationList.php";
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <?php
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
                    //include_once "./src/View/reservationList.php";
                ?>
            </div>
        </main>
        <?php
            include_once "./src/layout/footer.php";
        ?>
    </body>
    </html>