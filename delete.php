<?php

require_once "class/MysqlConnection.php";

$connection = MysqlConnection::getInstance();

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location:reservationsList.php');
    exit;
}

$deleteRoom = "DELETE FROM rooms WHERE id=:id";
$statement = $connection->prepare($deleteRoom);
$statement->bindValue(':id', $id);
$statement->execute();

header('Location:reservationsList.php');