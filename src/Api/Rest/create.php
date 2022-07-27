<?php

require_once "../../../vendor/autoload.php";

require_once "Reservation/ReservationApi.php";

use Api\Reservation\ReservationApi;

//Below method didn't work for me. I guess it's maybe I have serverApi: FPM/FastCGI

//if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header("WWW-Authenticate: Basic realm=\"Private Area\"");
//    header("HTTP/1.0 401 Unauthorized");
//
//    try {
//        echo json_encode(['message' => "Unauthorized access"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//    }
//} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
//    $api = new ReservationApi();
//
//    header('Content-Type: application/json');
//    try {
//        echo json_encode($api->addReservation(), JSON_PRETTY_PRINT, JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//    }
//}

//Below method is working but without authorisation
if ($_SERVER['REQUEST_METHOD'] === "POST" && array_key_exists('addReservation', $_REQUEST)) {
    $api = new ReservationApi();

    header('Content-Type: application/json');
    try {
        echo json_encode($api->addReservation(), JSON_PRETTY_PRINT, JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
}