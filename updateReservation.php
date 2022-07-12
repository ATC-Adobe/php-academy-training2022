<?php

include "views/layouts/head.php";
include "views/layouts/navbar.php";

?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Delete reservation</h4></div>
                <div class="card-body">
                    <?php
                    $reservation_id = $_GET['reservation_id'];
                    $roomId = $_GET['room_id'];
                    $email = $_GET['email'];
                    $firstName = $_GET['firstname'];
                    $lastName = $_GET['lastname'];
                    $startDate = $_GET['start_date'];
                    $endDate = $_GET['end_date'];
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="reservation_id">Reservation ID</label>
                            <input type="" class="form-control" name="reservation_id" value="<?php
                            echo $reservation_id ?>">
                        </div>
                        <div class="form-group">
                            <label for="roomId">Room Id</label>
                            <input type="" class="form-control" name="room_id" value="<?php
                            echo $roomId ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Lastname</label>
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
                            <input type="" class="form-control" name="start_date"
                                   value="<?php
                                   echo $startDate; ?>">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Date to</label>
                            <input type="" class="form-control" name="end_date"
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