<?php declare(strict_types=1);
require_once '../../autoloading.php';
session_start();
var_dump($_SESSION);

use Database\Connection;
use Repository\Reservation;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../layout/bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <?php require_once '../layout/layout.php' ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-3 col-xl-12 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Thank you for your reservations!</h1>
                        <div class="text-center m-2 mt-5">
                            <table class="table table-bordered text-white table-dark room-table">
                                <tr>
                                    <th>reservation_id</th>
                                    <th>room_id</th>
                                    <th>room_name</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>email</th>
                                    <th>start_date</th>
                                    <th>end_date</th>
                                    <th></th>
                                </tr>
                                <?php
                                require_once '../../autoloading.php';
                                $dbConnection = Connection::getInstance();
                                $reservation = new Reservation();
                                $selectResults = $reservation->getAllReservations();
                                foreach ($selectResults as $result) {
                                    $query = "SELECT name FROM room WHERE room_id = '" . $result['room_id'] . "'";
                                    $roomName = $dbConnection->query($query)->fetchColumn(0);
                                    $queryUserId = "SELECT user_id FROM user WHERE user_id = '" . $result['user_id'] . "'";
                                    $userId = $dbConnection->query($queryUserId)->fetchColumn();
                                    if ($userId != $_SESSION['user_id']) continue;
                                    ?>
                                    <tr>
                                        <td><?= $result['reservation_id']; ?></td>
                                        <td><?= $result['room_id']; ?></td>
                                        <td><?= $roomName ?></td>
                                        <td><?= $result['firstname']; ?></td>
                                        <td><?= $result['lastname']; ?></td>
                                        <td><?= $result['email']; ?></td>
                                        <td><?= $result['start_date']; ?></td>
                                        <td><?= $result['end_date'] ?></td>
                                        <td>
                                            <form method="post" action="../Controller/ReservationController.php">
                                                <input type="hidden" name="reservation_id"
                                                       value="<?= $result['reservation_id'] ?>">
                                                <input type="hidden" name="delete" value="true">
                                                <input type="submit" value="Delete" class="btn btn-outline-light">
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Your Website 2021</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
