<?php
    declare(strict_types=1);
    require './vendor/autoload.php';

    use Api\Reservation\GraphqlApi;
    use System\Session\Session;

    $session = Session::getInstance();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getAllReservations', $_REQUEST)) {
        $api = new GraphqlApi();

        header ('Content-Type: application/json');
        $api->reservations();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getCurrentReservations', $_REQUEST)) {
        $api = new GraphqlApi();

        header ('Content-Type: application/json');
        $api->reservations();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' &&
            (array_key_exists('getUserReservations', $_REQUEST)
            && array_key_exists('userId', $_REQUEST))) {
        $api = new GraphqlApi();

        header ('Content-Type: application/json');
        $api->reservations();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
        $api = new GraphqlApi();

        header ('Content-Type: application/json');
        $api->reservations();
    }