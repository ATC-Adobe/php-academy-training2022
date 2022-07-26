<?php

include_once 'autoloading.php';

use Api\Reservation\ReservationApi;
use Api\Room\RoomApi;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getRooms', $_REQUEST)) {
    $api = new RoomApi();
    header("Content-Type: application/json");
    try {
        echo json_encode($api->getRooms(), JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getReservations', $_REQUEST)) {
    $api = new ReservationApi();
    header("Content-Type: application/json");
    try {
        echo json_encode($api->getReservations(), JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getCurrentReservations', $_REQUEST)) {
    $api = new ReservationApi();
    header("Content-Type: application/json");
    try {
        echo json_encode($api->getCurrentReservations(), JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('getReservationByUser', $_REQUEST)) {
    $api = new ReservationApi();
    $userId = $_POST['userId'];
    header("Content-Type: application/json");
    try {
        echo json_encode($api->getReservationByUser($userId), JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
}
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    try {
        echo json_encode(['message' => "Unauthorized access"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
    $api = new ReservationApi();
    $roomId = $_POST['roomId'];
    $userId = $_POST['userId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    header("Content-Type: application/json");
    try {
        echo json_encode(
            $api->addReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate),
            JSON_THROW_ON_ERROR
        );

    } catch (JsonException $e) {
    }
}

