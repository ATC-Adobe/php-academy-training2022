<?php

use System\Database\Connection;

include "views/layouts/head.php";
include "views/layouts/navbar.php";

?>

<body>

<!--Conference rooms list-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header"><h4>Reservation</h4></div>
                <div class="card-body">

                    <?php
                    $message = 'Your booking is confirmed.';
                    include_once "helpers/message-add.php";
                    require_once 'db/Connection.php';
                    require_once 'services/ReservationService.php';
                    $dbConnection = Connection::getConnection();
                    $reservations = (new ReservationService())->getReservations($dbConnection);

                    if (isset($_GET['reservation_id'])) {
                        $reservationId = $_GET['reservation_id'];
                        $destroy = $dbConnection->query(
                            "DELETE FROM reservations WHERE reservation_id='$reservationId'"
                        );
                    }

                    ?>

                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                        <tr>
                            <th>Reservation Id</th>
                            <th>Room id</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($reservations as $res):
                            ?>

                            <tr>
                                <th><?php
                                    echo $res['reservation_id']; ?></th>
                                <td><?php
                                    echo $res['room_id']; ?></td>
                                <td><?php
                                    echo $res['firstname']; ?></td>
                                <td><?php
                                    echo $res['lastname']; ?></td>
                                <td><?php
                                    echo $res['email']; ?></td>
                                <td><?php
                                    echo $res['start_date']; ?></td>
                                <td><?php
                                    echo $res['end_date']; ?></td>
                                <td>
                                    <?php
                                    echo "<a class=\"btn btn-sm btn-outline-warning\" href=\"/updateReservation.php?reservation_id={$res['reservation_id']}&room_id={$res['room_id']}&firstname={$res['firstname']}&lastname={$res['lastname']}&email={$res['email']}&start_date{$res['start_date']}&end_date{$res['end_date']}\">Update</a>",
                                    "<a class=\"btn btn-sm btn-outline-danger\" href=\"/reservations.php?reservation_id={$res['reservation_id']}\">Delete</a>"; ?>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                        ?>

                        </tbody>
                    </table>
                </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $("#bookSaved").remove();
        }, 5000);
    });
</script>
</html>