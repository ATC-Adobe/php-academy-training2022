<?php

require "ReservationService.php";

$error = '';
$message = '';
$room_id = '';
$firstname = '';
$lastname = '';
$email = '';
$start_date = '';
$end_date = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['room_id'])) {
        $error .= '<p class="text-danger">Room id is required.</p>';
    } else {
        $room_id = $_POST['room_id'];
    }
    if (empty($_POST['firstname'])) {
        $error .= '<p class="text-danger">Firstname is required.</p>';
    } else {
        $firstname = $_POST["firstname"];
    }
    if (empty($_POST['lastname'])) {
        $error .= '<p class="text-danger">Lastname is required.</p>';
    } else {
        $lastname = $_POST["lastname"];
    }
    if (empty($_POST['email'])) {
        $error .= '<p class="text-danger">Email is required.</p>';
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST['start_date'])) {
        $error .= '<p class="text-danger">Date from is required.</p>';
    } else {
        $start_date = $_POST["start_date"];
    }
    if (empty($_POST['end_date'])) {
        $error .= '<p class="text-danger">Date to is required.</p>';
    } else {
        $end_date = $_POST["end_date"];
    }
    if ($error == '') {
        ReservationService::booking();
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
            <li class="nav-item">
                <a class="nav-link" href="reservations.php">Reservations</a>
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
                        <?php echo $error; ?>
                        <div class="form-group">
                            <?php
                            $name = $_GET['name'];
                            $room_id = $_GET['room_id'];
                            ?>
                            <label for="roomId">Room Name</label>
                            <input type="hidden" class="form-control" name="room_id" value="<?php echo $room_id ?>">
                            <input type="text" class="form-control" name="roomName" disabled
                                   value="<?php echo $name ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Date from</label>
                            <input type="datetime-local" class="form-control" name="start_date"
                                   value="<?php echo $start_date; ?>">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Date to</label>
                            <input type="datetime-local" class="form-control" name="end_date"
                                   value="<?php echo $end_date; ?>">
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