<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";

    use Controller\Reservation\AddReservationController;

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
        header ('Location: ./login.php');
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

                    if($session->get('reservationAddError')) {
                        if ($session->get('reservationAddError') === 'PAST_DATE') {
                            echo "<div class='alert alert-danger' role='alert'>
                                <span>The start date cannot be earlier than the current time!</span>
                            </div>";
                        } else if ($session->get('reservationAddError') === 'INCORRECT_DATE') {
                            echo "<div class='alert alert-danger' role='alert'>
                                <span>The start date of the reservation cannot be older than the end date!</span>
                            </div>";
                        } else if ($session->get('reservationAddError') === 'ROOM_NOT_AVAILABLE') {
                            echo "<div class='alert alert-danger' role='alert'>
                                <span>Room is not available in this date. Try different date.</span>
                            </div>";
                        }
                        $session->unset('reservationAddError');
                    }

                    if (isset($_GET['roomId']) && isset($_GET['name'])) {
                        $roomId = $_GET['roomId'];

                        echo "<h2 class='text-center'>Reserve " . $_GET['name'] . "</h2>";
                        $input = "<input type='hidden' name='roomId' value='".$roomId."'>";
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