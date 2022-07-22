<?php

use Controllers\Reservation\DeleteReservation;
use Session\Session;

require_once "../autoloader.php";

$id = $_POST['id'] ?? null;

//echo '<pre>';
//var_dump($id);
//echo '</pre>';
//die;

if (!$id) {
    header('Location:myReservations.php');
    exit;
}
$deleteReservation = new DeleteReservation();
$deleteReservation->deleteReservation();
$session = new Session();
$session->set('reservationDeleted');

header('Location:myReservations.php');exit;
