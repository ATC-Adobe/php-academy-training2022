<?php
declare(strict_types = 1);
require_once 'autoloading.php';

if(isset($_POST['id'])) {
    (new \Controller\RemoveReservationController())
        ->makeRequest();
}

include "src/View/ReservationView.php";



