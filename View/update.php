<?php

require_once "../autoloader.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location:reservationsList.php');
    exit;
}

$editRoom = new \Controllers\Reservation\UpdateReservation();
$editRoom->editReservation();

//var_dump($editRoom);die;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedReservation = new \Controllers\Reservation\UpdateReservation();
    $updatedReservation->updateReservation();

    header('Location:reservationsList.php');
}

//$statement = $connection->prepare("SELECT * FROM rooms WHERE id = :id");
//$statement->bindValue(':id', $id);
//$statement->execute();

//$room = $statement->fetch(PDO::FETCH_ASSOC);

//$roomId = $room['roomId'];
//$firstName = $room['firstName'];
//$lastName = $room['lastName'];
//$email = $room['email'];
//$startDay = $room['startDay'];
//$endDay = $room['endDay'];
//$startHour = $room['startHour'];
//$endHour = $room['endHour'];

//$updateReservayion = new \Controllers\UpdateReservation();
//$updateReservayion->editReservation();

?>

<?php require_once "../layout/header.html"; ?>
<?php require_once "../layout/navbar.php"; ?>
<?php require_once "../Form/reservationForm.php"; ?>
<?php require_once "../layout/footer.html"; ?>