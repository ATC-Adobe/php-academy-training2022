<?php

use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;

?>

<!DOCTYPE html>
<html>

<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="layout/css/style.css">

    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body>

<?php
if(__ROUTER) {
    include "layout/menur.php";
}
else {
    require "layout/menu.html";
}
?>

<div class="header">
    Room reservation service
    <br><br>
    <div class="main">

        <br>

        <br><br>
        <span style="font-size: 1.5em">Choose room to continue:</span> <br><br><br><br>

        <table>
                <tr>
                    <th style="width:10%">ID</th>
                    <th style="width:40%">Name</th>
                    <th style="width:10%">Floor</th>
                    <th> </th>
                </tr>
                <tr>&#8203;</tr>

            <?php
            $entries = (new RoomConcreteRepository())
                ->getAllRooms();

            foreach($entries as $entry) {

                if(! $entry instanceof RoomModel) {
                    echo "This should not happen";
                    die();
                }

                $id     = $entry->getId();
                $name   = $entry->getName();
                $floor  = $entry->getFloor();

                echo "<tr>";
                echo "<td> $id </td>";
                echo "<td> $name </td>";
                echo "<td> $floor </td>";

                if(__ROUTER) {
                    echo "<td><a href='roomReservationForm?id=$id'> Reserve ></a></td>";
                }
                else {
                    echo "<td><a href='roomReservationForm.php?id=$id'> Reserve ></a></td>";
                }

                echo "</tr>";
            }
            ?>
            <tr>&#8203;</tr>
        </table>

    </div>
</div>

<?php include 'layout/footer.html' ?>
</body>
</html>


