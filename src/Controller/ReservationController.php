<?php

use Database\Connection;
use Repository\Reservation;

require_once '../../autoloading.php';
$dbConnection = Connection::getInstance();

if (count($_POST) > 0) {
    $reservation = new Reservation();
    $reservation->addReservation();

}

header('Location: http://localwsl.com/src/View/reservations.php');