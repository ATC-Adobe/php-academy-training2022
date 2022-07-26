<?php
//require_once 'src/Database/Connection.php';
//use Database\Connection;
//$connection = Connection::getInstance();
//$selectQuery = "SELECT * FROM reservation";
//$selectResults = $connection->query($selectQuery)->fetchAll();
//$reservations = [];
//$newDate = new DateTime();
//$presentDate = $newDate->format('Y-m-d H:i:s');
//var_dump($presentDate);
//foreach ($selectResults as $result) {
//    if($result['start_date'] > $presentDate){
//        $reservations[] = [
//            'reservation_id' => $result['reservation_id'],
//            'room_id' => $result['room_id'],
//            'firstname' => $result['firstname'],
//            'lastname' => $result['lastname'],
//            'email' => $result['email'],
//            'start_date' => $result['start_date'],
//            'end_date' => $result['end_date'],
//            'user_id' => $result['user_id'],
//        ];
//    }
//}
//var_dump($reservations);


require_once 'RoomApi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getAllRooms', $_REQUEST)) {
    $api = new RoomApi();

    header("Content-Type: application/json");
    echo json_encode($api->getAllRooms());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getAllReservations', $_REQUEST)) {
    $api = new RoomApi();

    header("Content-Type: application/json");
    echo json_encode($api->getAllReservations());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getActualReservations', $_REQUEST)) {
    $api = new RoomApi();

    header("Content-Type: application/json");
    echo json_encode($api->getActualReservations());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getUserReservations', $_REQUEST)) {
    $api = new RoomApi();
    $userId = $_GET['user_id'];
    header("Content-Type: application/json");
    echo json_encode($api->getUserReservations($userId));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('createReservation', $_REQUEST)) {
    $api = new RoomApi();
    $roomId = $_GET['room_id'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];
    $userId = $_GET['user_id'];

    header("Content-Type: application/json");
    echo json_encode($api->createReservation($roomId, $firstname, $lastname, $email, $startDate, $endDate, $userId));
}

//session_start();
//use Repository\Room;
//use Database\Connection;
//
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8"/>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>-->
<!--    <meta name="description" content=""/>-->
<!--    <meta name="author" content=""/>-->
<!--    <title>Modern Business - Start Bootstrap Template</title>-->
<!--    <!-- Favicon-->-->
<!--    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>-->
<!--    <!-- Bootstrap icons-->-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>-->
<!--    <!-- Core theme CSS (includes Bootstrap)-->-->
<!--    <link href="src/layout/bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet"/>-->
<!--</head>-->
<!--<body class="d-flex flex-column h-100">-->
<!--<main class="flex-shrink-0">-->
<!--    <!-- Navigation-->-->
<!--    --><?php //require_once 'src/layout/layout.php' ?>
<!--    <!-- Header-->-->
<!--    <header class="bg-dark py-5">-->
<!--        <div class="container px-5">-->
<!--            <div class="row gx-5 align-items-center justify-content-center">-->
<!--                <div class="col-lg-8 col-xl-7 col-xxl-6">-->
<!--                    <div class="my-5 text-center text-xl-start">-->
<!--                        <h1 class="display-5 fw-bolder text-white mb-2">Please register or login to reserve a room</h1>-->
<!---->
<!--<!-- Bootstrap core JS-->-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>-->
<!---->
<!--<!-- Core theme JS-->-->
<!--<script src="js/scripts.js"></script>-->
<!--</body>-->
<!--</html>-->
