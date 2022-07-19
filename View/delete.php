<?php

use Controllers\Reservation\DeleteReservation;

require_once "../autoloader.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location:reservationsList.php?delete=true');
    exit;
}
$deleteReservation = new DeleteReservation();
$deleteReservation->deleteReservation();
header('Location:reservationsList.php?delete');
