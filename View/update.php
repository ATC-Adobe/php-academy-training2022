<?php


use Controllers\Reservation\UpdateReservation;

require_once "../autoloader.php";

session_start();

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location:myReservations.php');
    exit;
}

$getReservationData = new UpdateReservation();
$editReservation = $getReservationData->editReservation($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedReservation = new UpdateReservation();
    $updatedReservation->updateReservation();

    header('Location:myReservations.php');
}

?>
<?php
require_once "../layout/header.html"; ?>
<?php
require_once "../layout/navbar.php"; ?>
<?php
require_once "../Form/updateReservationForm.php"; ?>
<?php
require_once "../layout/footer.html"; ?>