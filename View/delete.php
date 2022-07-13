<?php

require_once "../autoloader.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location:reservationsList.php');
    exit;
}
$deleteReservation = new \Controllers\DeleteReservation();
$deleteReservation->deleteReservation();
header('Location:reservationsList.php');
