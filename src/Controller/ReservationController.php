<?php

use Database\Connection;
use Repository\Reservation;

require_once '../../autoloading.php';

if (count($_POST) > 0 && $_POST['delete'] != 'true') {
    $reservation = new Reservation();
    $reservation->addReservation();
}

if(count($_POST) > 0 && $_POST['delete'] == 'true'){
    $reservation = new Reservation();
    $reservation->deleteReservation($_POST['reservation_id']);
}

header('Location: http://localwsl.com/src/View/reservations.php');