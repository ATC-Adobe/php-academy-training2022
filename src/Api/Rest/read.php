<?php

//require_once "Room/RoomApi.php";
require '../../../vendor/autoload.php';

use Api\Rest\Room\RoomApi;

//Display in Postman all reservations
if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getAllReservations', $_REQUEST)) {
    $api = new RoomApi();

    header('Content-Type: application/json');
    echo json_encode($api->getAllReservations(), JSON_PRETTY_PRINT);
}

//Display in Postman all available reservations
if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getCurrentlyAvailableReservations', $_REQUEST)) {
    $api = new RoomApi();

    header('Content-Type: application/json');
    echo json_encode($api->getCurrentlyAvailableReservations(), JSON_PRETTY_PRINT);
}

//Display in Postman user's reservations
if ($_SERVER['REQUEST_METHOD'] === 'GET' &&
    (array_key_exists('getUserReservations', $_REQUEST)
        && array_key_exists('userId', $_REQUEST))) {
    $api = new RoomApi();

    header('Content-Type: application/json');
    echo json_encode($api->getUserReservations($_GET['userId']), JSON_PRETTY_PRINT);
}