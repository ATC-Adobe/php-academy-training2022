<?php

require_once "../autoloader.php";
require_once "../src/Constants/constants.php";

$roomId = '';
$firstName = '';
$lastName = '';
$email = '';
$startDay = '';
$endDay = '';
$startHour = '';
$endHour = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationController = new \Controllers\Reservation\CreateReservation();
    $reservationController->getDataFromForm();

    header('Location:reservationsList.php?reservation');
}
?>

<?php
require_once "../layout/header.html" ?>
<?php
require_once "../layout/navbar.html" ?>
    <div id="room-name">
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