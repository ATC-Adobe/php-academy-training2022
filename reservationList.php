<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
</head>
<body class="background">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/reservationList.php">Current reservations</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="container my-3">
    <?php

    include_once "./services/ReservationService.php";

    $reservationService = new ReservationService();
    $error = "";
    $ok = true;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reservation = [];
        $reservation['room_id'] = htmlentities($_POST['room_id']);
//        $reservation['room_name'] = htmlentities($_POST['room_name']);
        $reservation['first_name'] = htmlentities($_POST['first_name']);
        $reservation['last_name'] = htmlentities($_POST['last_name']);
        $reservation['email'] = htmlentities($_POST['email']);
        $reservation['start_date'] = htmlentities($_POST['start_date']);
        $reservation['end_date'] = htmlentities($_POST['end_date']);

        $start = strtotime($reservation['start_date']);
        $end = strtotime($reservation['end_date']);

        if($end < $start) {
            $error = "End date must be after start date!";
            $ok = false;
        }
//        if($ok && !$reservationService->checkReservationCollision($reservation)) {
//            $error = "Already occupied";
//            $ok = false;
//        }
        if($ok && ! $reservationService->saveReservation($reservation)) {
            $error = "Something went wrong! Try again";
            $ok = false;
        }
    }

    ?>
            <h1 class="text-center">All reservations</h1>
    <?php
        if(!$ok) {
            echo '<div class="alert alert-danger text-center">'. $error .'</div>';
        }

    $reservations = $reservationService->readReservations();
        for($i=0; $i<count($reservations); $i++) {
            if(!($i % 2)) echo '<div class="row">';
            echo     '<div class="col col-md-6 listItem pt-3">';
            echo        '<h6>Reservation id: '. $reservations[$i]->reservation_id .'</h6>';
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
    ?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>