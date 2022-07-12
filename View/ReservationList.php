<?php

namespace App\View;

use App\Service\ReservationService;
use App\View\Component\Navbar;

class ReservationList {
    public function render(string $msg = "") {
        echo '
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/View/css/style.css">
</head>
<body class="background">';
        (new Navbar())->render();

   echo '<div class="container my-3">
            <h1 class="text-center">All reservations</h1>';
        if($msg) {
            echo '<div class="alert alert-info text-center">'. $msg .'</div>';
        }
    $reservations = (new ReservationService())->readReservations();
        //empty -> false
        if($reservations === false) {
            echo '<div class="alert alert-danger text-center">Something went wrong. Try again</div>';
        }
        for($i=0; $i<count($reservations); $i++) {
            if(!($i % 2)) echo '<div class="row">';
            echo     '<div class="col col-md-6 listItem pt-3">';
            echo        '<h6>Reservation id: '. $reservations[$i]->id .'</h6>';
                echo     '<ul class="w-100">';
                echo         '<li>room id: '. $reservations[$i]->room_id .'</li>';
                echo         '<li>first name: '. $reservations[$i]->first_name .'</li>';
                echo         '<li>last name: '. $reservations[$i]->last_name .'</li>';
                echo          '<li>email: '. $reservations[$i]->email .'</li>';
                echo         '<li>start_date: '. $reservations[$i]->start_date .' </li>';
                echo         '<li>end_date: '. $reservations[$i]->end_date .' </li>';
                echo     '</ul>';
                echo        '</div>';
            if(($i % 2)) echo '</div>';
        }
        echo '
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
        ';
    }
}
