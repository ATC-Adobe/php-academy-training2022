<?php
    declare(strict_types = 1);
    require_once "./class/CsvManager.php";
    use PHPCourse\CsvReader;

    $read = new CsvReader("./data/reservations.csv");
    $reservations = $read->getArrayFromFile();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reservation list</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
    </head>
    <body>

        <div id="main">

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
                foreach($reservations as $reservation) {

                    [ $reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate ] = $reservation;

                    echo "<tr>";
                    echo "<td>".$reservationId."</td>";
                    echo "<td>".$roomId."</td>";
                    echo "<td>".$firstName."</td>";
                    echo "<td>".$lastName."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td>".$startDate."</td>";
                    echo "<td>".$endDate."</td>";
                    echo "</tr>";
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