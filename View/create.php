<?php

use Controllers\Reservation\CreateReservation;
use Session\Session;

require_once "../autoloader.php";

session_start();

require_once "../src/Constants/constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationController = new CreateReservation();
    $reservationController->getDataFromForm();

    $session = new Session();
    $session->set('reservationAdded');
    header('Location:myReservations.php');
    exit();
}
?>

<?php
require_once "../layout/header.html" ?>
<?php
require_once "../layout/navbar.php" ?>
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