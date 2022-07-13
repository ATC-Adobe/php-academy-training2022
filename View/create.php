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
    $reservationController->createReservation();

    header('Location:reservationsList.php');
}

?>

<?php
require_once "../layout/header.html" ?>
<?php
require_once "../layout/navbar.html" ?>
    <div id="room-name">
        <?php
        // Printing Room Id from the previous file (index.php)
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $id = $_GET['roomId'] ?? null;
        }
        if (!empty($id)) {
            echo "Wybrano Salę $id";
        }
        ?>
    </div>
<?php
require_once "../Form/form.php" ?>
<?php
require_once "../layout/footer.html" ?>