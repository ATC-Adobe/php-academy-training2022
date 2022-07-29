<?php
    declare(strict_types = 1);
    require './vendor/autoload.php';

    use Controller\Reservation\AddReservationController;
    use System\StatusHandler\Status;
    use System\Session\Session;

    $session = Session::getInstance();

    if ($session->get('user_id')) {
        if (isset($_POST['roomId']) &&
            isset($_POST['firstName']) &&
            isset($_POST['lastName']) &&
            isset($_POST['email']) &&
            isset($_POST['startDate']) &&
            isset($_POST['endDate'])
        ) {
            (new AddReservationController())->request();
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
                    if (isset($_GET['roomId']) && isset($_GET['name'])) {
                        $roomId = $_GET['roomId'];
                        $roomName = $_GET['name'];

                        echo "<h2 class='text-center'>Reserve " . $_GET['name'] . "</h2>";
                        $inputs = "<input type='hidden' name='roomId' value='".$roomId."'>
                                     <input type='hidden' name='roomName' value='".$roomName."'>";
                    } else {
                        header ("Location: ./index.php");
                        die();
                    }
                    include_once "./src/Form/reservationForm.php";
                ?>
            </div>
        </main>
        <?php
            include_once "./src/layout/footer.php";
        ?>
    <script src='./src/layout/js/validator.js'></script>
    </body>
</html>