<?php
    declare(strict_types = 1);
    require_once "./class/CsvManager.php";
    use PHPCourse\CsvReader;

    $read = new CsvReader("./data/rooms.csv");
    $rooms = $read->getArrayFromFile();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rooms list</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
    </head>
    <body>

    <div id="main">

        <div id="content">
            <table class="table-list">
                <tr>
                    <th>Room ID:</th>
                    <th>Room name:</th>
                    <th>Floor:</th>
                    <th></th>
                </tr>

                <?php

                    foreach($rooms as $room) {
                        [ $roomId, $name, $floor ] = $room;

                        echo "<tr>";
                        echo "<td>".$roomId."</td>";
                        echo "<td>".$name."</td>";
                        echo "<td>".$floor."</td>";
                        echo "<td>
                                <form method='GET' action='./reservation.php'>
                                    <input type='hidden' name='roomId' value='".$roomId."'>
                                    <input type='hidden' name='name' value='".$name."'>
                                    <button class='btn-submit'>Reserve</button>
                                </form>
                                </td>";
                        echo "</tr>";
                    }

                ?>

                <tr>
                    <td colspan="4">...</td>
                </tr>
            </table>
        </div>

        <div id="footer">
            <p>&copy; Norbert Grudzień - 2022</p>
        </div>

    </div>

    </body>
</html>