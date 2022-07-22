<?php

declare(strict_types=1);

session_start();

use Controller\DeleteReservationController;
use Repository\ReservationRepository;
use Service\Session;
use System\Database\Connection;

require_once '../autoloading.php';

(new Session())->authorization();

include "../Layout/head.php";
include "../Layout/navbar.php";

?>

<body>

<!--Reservations list from DB-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-auto">
            <?php
            if (isset($_SESSION['success'])) {
                ?>
                <div class="alert alert-success" role="alert" id="success">
                    <?php
                    echo $_SESSION['success']; ?>
                </div>
                <?php
                unset ($_SESSION['success']);
            }
            ?>
            <?php
            if (isset($_SESSION['warning'])) {
                ?>
                <div class="alert alert-warning" role="alert" id="warning">
                    <?php
                    echo $_SESSION['warning']; ?>
                </div>
                <?php
                unset ($_SESSION['warning']);
            }
            ?>
            <div class="card">
                <div class="card-header"><h4>Reservations</h4></div>
                <div class="card-body">

                    <?php
                    $dbConnection = Connection::getConnection();
                    $reservations = (new ReservationRepository(
                        'reservation_id',
                        'room_id',
                        'id_user',
                        'firstname',
                        'lastname',
                        'email',
                        'start_date',
                        'end_date'
                    ))->getAllReservationsById($dbConnection);
                    (new DeleteReservationController())->deleteReservation($dbConnection);

                    ?>

                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                        <tr>
                            <th>Reservation Id</th>
                            <th>Room id</th>
                            <th>User id</th>
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
                                    echo $res['id_user']; ?></td>
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
                                    "<a class=\"btn btn-sm btn-outline-danger\" href=\"../View/reservations.php?reservation_id={$res['reservation_id']}\">Delete</a>"; ?>
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
