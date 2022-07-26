<?php
    declare(strict_types = 1);
    require './vendor/autoload.php';

    use Controller\Reservation\DeleteReservationController;
    use System\Session\Session;

    $session = Session::getInstance();


    if (isset($_POST['id'])) {
        (new DeleteReservationController())->request();
    }

    if(!$session->get('user_id')){
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
                include_once "./src/View/myReservationList.php";
            ?>
        </div>
    </main>
    <?php
        include_once "./src/layout/footer.php";
    ?>
</body>
</html>