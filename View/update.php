<?php

require_once "../autoloader.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location:reservationsList.php');
    exit;
}

$editRoom = new \Controllers\Reservation\UpdateReservation();
$editRoom->editReservation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedReservation = new \Controllers\Reservation\UpdateReservation();
    $updatedReservation->updateReservation();

    header('Location:reservationsList.php');
}

?>

<?php require_once "../layout/header.html"; ?>
<?php require_once "../layout/navbar.php"; ?>
<?php require_once "../Form/reservationForm.php"; ?>
<?php require_once "../layout/footer.html"; ?>