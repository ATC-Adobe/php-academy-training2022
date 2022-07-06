<?php declare(strict_types = 1); include_once "fileManipulator.php"; ?>

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

<div class="header">
    Room reservation service
    <br><br>
    <div class="main">
        <form method="post" action="order.php">

        <div class="float ltable">
            Room Id:<br>
            <br>
            Name:<br>
            Surname:<br>
            E-mail:<br>
            <br>
            From: <br>
            To: <br>
        </div>
        <div class="float rtable">

            <?php
                if(!isset($_GET['id'])) {
                    die( "No room specified" );
                }

                $id = $_GET['id'];

                echo '<input type="hidden" name="room_id" value="$id">';
                echo "$id<br>";
            ?>
            <br>
            <input type="text" name="name" ><br>
            <input type="text" name="surname" > <br>
            <input type="text" name="email" ><br>
            <br>
            <input type="datetime-local" name="from"><br>
            <input type="datetime-local" name="to"><br>
        </div>
        <div class="clear"></div>
            <br><br>
            <input type="submit" value="Submit Request >">
        </form>
    </div>
</div>
</body>
</html>