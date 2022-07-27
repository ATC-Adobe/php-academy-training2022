<?php

use Controllers\Reservation\CreateReservation;
use Session\Session;
use Validations\DateAndTimeValidation;

require_once "../vendor/autoload.php";

session_start();

require_once "../src/Constants/constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDay = date("Y-m-d", (strtotime($_POST['startDay'])));
    $endDay = date("Y-m-d", (strtotime($_POST['endDay'])));
    $startHour = date("H:i", (strtotime($_POST['startHour'])));
    $endHour = date("H:i", (strtotime($_POST['endHour'])));

    $dateTime = new DateAndTimeValidation();
    $checkDatesAndHours = $dateTime->checkDatesAndHours($startDay, $endDay, $startHour, $endHour);

    if ($checkDatesAndHours === 'true') {
        $reservationController = new CreateReservation();
        $reservationController->getDataFromForm();

        header('Location:myReservations.php');
        exit();
    } else {
        $value = 'unexpectedError';
        $session = new Session();
        $session->set($value);
    }
}
?>

<?php
require_once "../layout/header.html" ?>
<?php
require_once "../layout/navbar.php" ?>
    <div class="room-name">
        <?php
        // Printing Room Number from the previous file (index.php)
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $roomNumber = $_GET['roomNumber'] ?? null;
        }
        if (!empty($roomNumber)) {
            echo "Wybrano Salę $roomNumber";
        }
        ?>
    </div>
<?php
require_once "../Form/reservationForm.php" ?>
<?php
require_once "../layout/footer.html" ?>