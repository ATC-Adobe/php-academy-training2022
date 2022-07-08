<?php

require_once "services/ReservationService.php";
require_once "services/ReservationFormValidation.php";

$error = '';
$message = '';
$roomId = '';
$firstName = '';
$lastName = '';
$email = '';
$startDate = '';
$endDate = '';

if (isset($_POST['submit'])) {
    list($error, $roomId, $firstName, $lastName, $email, $startDate, $endDate) = (new ReservationFormValidation())->validated(
        $error,
        $roomId,
        $firstName,
        $lastName,
        $email,
        $startDate,
        $endDate
    );
    if ($error == '') {
        (new ReservationService())->addReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BookMyRoom | Conference room reservation system</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="/">BookMyRoom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item row">
                <a class="nav-link" href="reservations.php">Reservations</a>
                <a class="nav-link" href="rooms_json.php">Rooms with Json</a>
                <a class="nav-link" href="rooms_xml.php">Rooms with XML</a>
            </li>
        </ul>
    </div>
</nav>

<!--Booking form-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Book a Room</h4></div>
                <div class="card-body">
                    <form action="" method="post">
                        <?php
                        echo $error; ?>
                        <div class="form-group">
                            <?php
                            $name = $_GET['name'];
                            $roomId = $_GET['room_id'];
                            ?>
                            <label for="roomId">Room Name</label>
                            <input type="hidden" class="form-control" name="room_id" value="<?php
                            echo $roomId ?>">
                            <input type="text" class="form-control" name="roomName" disabled
                                   value="<?php
                                   echo $name ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" value="<?php
                            echo $firstName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname" value="<?php
                            echo $lastName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php
                            echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Date from</label>
                            <input type="datetime-local" class="form-control" name="start_date"
                                   value="<?php
                                   echo $startDate; ?>">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Date to</label>
                            <input type="datetime-local" class="form-control" name="end_date"
                                   value="<?php
                                   echo $endDate; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <a type="button" href="/" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-outline-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>