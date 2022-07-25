<?php
    declare(strict_types=1);

    require_once('./autoloading.php');

    use Api\Reservation\ReservationApi;

    //TODO:: API ROUTER CLASS
    //NOW ONLY FOR TESTING

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getAllReservations', $_REQUEST)) {
        $api = new ReservationApi();

        header ('Content-Type: application/json');
        echo json_encode($api->getAllReservations());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getCurrentReservations', $_REQUEST)) {
        $api = new ReservationApi();

        header ('Content-Type: application/json');
        echo json_encode($api->getCurrentReservations());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' &&
            (array_key_exists('getUserReservations', $_REQUEST)
            && array_key_exists('userId', $_REQUEST))) {
        $api = new ReservationApi();

        header ('Content-Type: application/json');
        echo json_encode($api->getUserReservations($_GET['userId']));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
        $api = new ReservationApi();


        header ('Content-Type: application/json');
        echo json_encode($api->addReservation());
    }