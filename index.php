<?php

use Repository\Room;
use Database\Connection;

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
    <link href="src/layout/bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <?php
    require_once 'autoloading.php';
    $dbConnection = Connection::getInstance();
    $selectQuery = "
    SELECT *
    FROM room;
    ";
    $selectResults = $dbConnection->query($selectQuery)->fetchAll();
    ?>
    <?php require_once 'src/layout/layout.php' ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Please make your choice!</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Reserve room for the meeting</p>
                        <div class="">
                            <div class="text-center">
                                <table class="table table-bordered text-white table-dark room-table">
                                    <tr>
                                        <th>room_id</th>
                                        <th>name</th>
                                        <th>floor</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach ($selectResults as $result) { ?>
                                        <tr>
                                            <td><?= $result['room_id']; ?></td>
                                            <td><?= $result['name']; ?></td>
                                            <td><?= $result['floor']; ?></td>
                                            <td>
                                                <form method="get" action="src/Form/form.php">
                                                    <input type="hidden" name="room_id"
                                                           value="<?= $result['room_id'] ?>">
                                                    <input type="submit" value="Reserve" class="btn btn-outline-light">
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
