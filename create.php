<?php
require_once "class/MysqlConnection.php";
$connection = MysqlConnection::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = $_POST['roomId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $startDay = $_POST['startDay'];
    $endDay = $_POST['endDay'];
    $startHour = $_POST['startHour'];
    $endHour = $_POST['endHour'];

    $createReservation = "INSERT INTO rooms (roomId, firstName, lastName, email, startDay, endDay, startHour, endHour) VALUES (:roomId, :firstName, :lastName, :email, :startDay, :endDay, :startHour, :endHour)";

    $statement = $connection->prepare($createReservation);
    $statement->bindValue(':roomId', $roomId);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':startDay', $startDay);
    $statement->bindValue(':endDay', $endDay);
    $statement->bindValue(':startHour', $startHour);
    $statement->bindValue(':endHour', $endHour);
    $statement->execute();
    header('Location:reservationsList.php');
}
?>