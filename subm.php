<?php declare(strict_types = 1); include_once "fileManipulator.php" ?>

<!DOCTYPE html>
<html>

<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body>

<?php
$istream = new CSVreader("reservations.csv");
$file = $istream->ParseFileToArray();
$istream->CloseStream();
?>

<div class="header">
    Room reservation service
    <br><br>
    <div class="main">
        <span style="font-size: 1.5em">Active reservations:</span> <br><br><br><br>

        <?php

        foreach($file as $entry) {

            [ $id, $room, $name, $surname, $email, $from, $to, ]
                = $entry;

            echo "<div class='row'>
                <div class='float ltable' style = 'line-height: 1.2em;' >
                    Reservation ID: <br>
                    Room ID: <br >
                    Name: <br >
                    E - mail: <br >
                    Time span: <br >
                </div >
                <div class='float rtable' style = 'line-height: 1.2em;' >
                    $id <br>
                    $room <br>
                    $name $surname <br>
                    $email <br>
                    $from - $to <br>
                </div >
                <div class='clear' ></div >
                </div>";
        }
        ?>

    </div>
</div>
</body>
</html>

