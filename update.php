<?php

require_once "class/MysqlConnection.php";

$connection = MysqlConnection::getInstance();

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location:reservationsList.php');
    exit;
}


$statement = $connection->prepare("SELECT * FROM rooms WHERE id = :id");
$statement->bindValue(':id', $id);
$statement->execute();

$room = $statement->fetch(PDO::FETCH_ASSOC);
$roomId = $room['roomId'];
$firstName = $room['firstName'];
$lastName = $room['lastName'];
$email = $room['email'];
$startDay = $room['startDay'];
$endDay = $room['endDay'];
$startHour = $room['startHour'];
$endHour = $room['endHour'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedRoomId = $_POST['roomId'];
    $updatedFirstName = $_POST['firstName'];
    $updatedLastName = $_POST['lastName'];
    $updatedEmail = $_POST['email'];
    $updatedStartDay = $_POST['startDay'];
    $updatedEndDay = $_POST['endDay'];
    $updatedStartHour = $_POST['startHour'];
    $updatedEndHour = $_POST['endHour'];

    $updateRoom = "UPDATE rooms SET roomId = :roomId, firstName = :firstName, lastName = :lastName, email = :email, startDay = :startDay, endDay = :endDay, startHour = :startHour, endHour = :endHour WHERE id = :id";

    $statement = $connection->prepare($updateRoom);
    $statement->bindValue(':roomId', $updatedRoomId);
    $statement->bindValue(':firstName', $updatedFirstName);
    $statement->bindValue(':lastName', $updatedLastName);
    $statement->bindValue(':email', $updatedEmail);
    $statement->bindValue(':startDay', $updatedStartDay);
    $statement->bindValue(':endDay', $updatedEndDay);
    $statement->bindValue(':startHour', $updatedStartHour);
    $statement->bindValue(':endHour', $updatedEndHour);
    $statement->bindValue(':id', $id);
    $statement->execute();

    header('Location:reservationsList.php');
}

require_once "layouts/header.html"; ?>
<body id="form-body">
<?php
require_once "layouts/navbar.html"; ?>

<form action="" method="POST" enctype="multipart/form-data" id="form">

    <div class="input-group f-input">
        <span class="input-group-text">Numer Sali</span>
        <input type="number" name="roomId" value="<?php
        echo $roomId ?>" class="form-control" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Imię</span>
        <input type="text" name="firstName" value="<?php
        echo $firstName ?>" aria-label="First name" class="form-control"
               pattern="[a-zA-Z]{1,}" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Nazwisko</span>
        <input type="text" name="lastName" value="<?php
        echo $lastName ?>" aria-label="Last name" class="form-control"
               pattern="[a-zA-Z]{1,}" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Adres E-Mail</span>
        <input type="email" name="email" value="<?php
        echo $email ?>" aria-describedby="emailHelp" class="form-control"
               required>
    </div>

    <div class="input-group">
        <span class="input-group-text">Wybierz dzień rozpoczęcia rezerwacji</span>
        <input type="date" value="<?php
        echo $startDay ?>" name="startDay">
        <span class="input-group-text">Wybierz dzień zakończenia rezerwacji</span>
        <input type="date" value="<?php
        echo $endDay ?>" name="endDay">
    </div>

    <h4>Sale można rezerwować od Poniedziałku do Piątku</h4>

    <div class="input-group">
        <span class="input-group-text">Wybierz godzinę rozpoczęcia rezerwacji</span>
        <input type="time" value="<?php
        echo $startHour ?>" name="startHour" min="08:00" max="15:00" required>
        <span class="input-group-text">Wybierz godzinę zakończenia rezerwacji</span>
        <input type="time" value="<?php
        echo $endHour ?>" name="endHour" min="09:00" max="16:00" required>
    </div>

    <h4>Sale można rezerwować od 8:00 do 16:00</h4>

    <button type="submit" class="btn btn-info submit">Zapisz</button>
</form>
<?php
require_once "layouts/footer.html" ?>
</body>
</html>
