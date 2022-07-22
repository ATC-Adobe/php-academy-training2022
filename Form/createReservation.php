<?php

declare(strict_types=1);

use Controller\CreateReservationController;
use Service\Session;

require_once "../autoloading.php";

session_start();

(new Session())->authorization();

include_once "../Layout/head.php";
include_once "../Layout/navbar.php";

$error = '';
$roomId = '';
$userId = '';
$firstName = '';
$lastName = '';
$email = '';
$startDate = '';
$endDate = '';

[$error, $roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate] = (new CreateReservationController(
))->createReservation(
    $error,
    $roomId,
    $userId,
    $firstName,
    $lastName,
    $email,
    $startDate,
    $endDate
);

?>
<body>

<!--Booking form-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Book a Room</h4></div>
                <div class="card-body">
                    <form action="" method="post">
                        <p class="text-danger"><?php
                            echo $error; ?></p>
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
                            <?php
                            $userId = $_SESSION['userId'];
                            ?>
                            <label for="userid">User Id</label>
                            <input type="text" class="form-control" name="userid" value="<?php
                            echo $userId; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                            $firstName = $_SESSION['userFirstName'];
                            ?>
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" value="<?php
                            echo $firstName; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                            $lastName = $_SESSION['userLastName'];
                            ?>
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname"  value="<?php
                            echo $lastName; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                            $email = $_SESSION['userEmail'];
                            ?>
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
                    <a type="button" href="../View/rooms.php" class="btn btn-sm btn-outline-secondary"
                       data-dismiss="modal">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-sm btn-outline-success">Save in DB</button>
                    <button type="submit" name="submit-csv" class="btn btn-sm btn-outline-success">Save as CSV</button>
                    <button type="submit" name="submit-xml" class="btn btn-sm btn-outline-success">Save as XML</button>
                    <button type="submit" name="submit-json" class="btn btn-sm btn-outline-success">Save as JSON
                    </button>
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