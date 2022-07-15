<?php

require_once "../autoloader.php";

$roomId = '';
$firstName = '';
$lastName = '';
$email = '';
$startDay = '';
$endDay = '';
$startHour = '';
$endHour = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationController = new \Controllers\CreateReservation();
    $reservationController->createReservationMysql();

    header('Location:reservationsList.php');
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