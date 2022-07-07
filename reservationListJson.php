<?php
    declare(strict_types = 1);

    $file = file_get_contents("./data/reservations.json", true);
    $json = json_decode($file, true);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reservation list</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>

        <div id="main">

            <nav class="navbar navbar-dark navbar-expand-lg bg-darkcustom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">PHPCourse</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservationList.php">Reservations CSV</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservationListXml.php">Reservations XML</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="./reservationListJson.php">Reservations JSON</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Test</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="content">

            <?php

                if (isset($_GET['reserved'])) {
                    if ($_GET['reserved'] == "true") {
                        echo "<h2 class='confirm'>Reservation confirmed</h2>";
                    } else {
                        echo "<h2 class='confirm'>Something went wrong, back to <a href='./index.php' class='link-default'>room list</a>.</h2>";
                    }
                }

            ?>
            <table class="table-list">
                <tr>
                    <th>Reservation ID:</th>
                    <th>Room ID:</th>
                    <th>First name:</th>
                    <th>Second name:</th>
                    <th>Email:</th>
                    <th>From:</th>
                    <th>To:</th>
                </tr>

                <?php
                    foreach ($json as $array) {
                        foreach ($array as $r) {
                            echo "<tr>";
                            echo "<td>".$r['reservationId']."</td>";
                            echo "<td>".$r['roomId']."</td>";
                            echo "<td>".$r['firstName']."</td>";
                            echo "<td>".$r['lastName']."</td>";
                            echo "<td>".$r['email']."</td>";
                            echo "<td>".$r['startDate']."</td>";
                            echo "<td>".$r['endDate']."</td>";
                            echo "</tr>";
                        }
                    }
                ?>

                <tr>
                    <td colspan="7">...</td>
                </tr>
            </table>
            </div>

            <div id="footer">
                <p>&copy; Norbert Grudzień - 2022</p>
            </div>

        </div>

    </body>
</html>