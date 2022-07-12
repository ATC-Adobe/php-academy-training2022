<?php declare(strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/autoloading.php";

if(isset($_POST['room_id'])) {
    [ $room_id, $name, $surname, $email, $from, $to, ]
        = [ $_POST['room_id'],  $_POST['name'],     $_POST['surname'],
            $_POST['email'],    $_POST['from'],     $_POST['to']];


    $from = date("d/m/y H:i:s", strtotime($from));
    $to   = date("d/m/y H:i:s", strtotime($to));

    $serv = new ReservationService();
    $res = $serv->makeRequest($room_id, $name, $surname, $email, $from, $to);

    if( $res  ) { // success
        header('Location: roomReservationListing.php?status=1');
    }
    else {
        header('Location: roomReservationListing.php?status=2');
    }

    die();
}

