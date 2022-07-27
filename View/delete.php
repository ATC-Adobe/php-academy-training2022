<?php

use Controllers\Reservation\DeleteReservation;
use Session\Session;

require_once "../vendor/autoload.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location:myReservations.php');
    exit;
}
$deleteReservation = new DeleteReservation();
$deleteReservation->deleteReservation();
$session = new Session();
$session->set('reservationDeleted');

header('Location:myReservations.php');exit;
