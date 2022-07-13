<?php

echo '<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>reservation</title>
</head>
<body>
<table class="table table-bordered table-dark">
    <thead>
    <tr>
        <th scope="col">room_id</th>
        <th scope="col">name</th>
        <th scope="col">floor</th>
        <th scope="col">zarezerwuj</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Room_1</td>
        <td>1</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="1"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Room_2</td>
        <td>1</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="2"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Room_3</td>
        <td>2</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="3"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>4</td>
        <td>Room_4</td>
        <td>2</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="4"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>5</td>
        <td>Room_5</td>
        <td>2</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="5"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>6</td>
        <td>Room_6</td>
        <td>3</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="6"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>7</td>
        <td>Room_7</td>
        <td>3</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="7"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>8</td>
        <td>Room_8</td>
        <td>3</td>
        <td><form method="get" action="formularz.php"><input type="hidden" name="room" value="8"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    </tbody>
</table>
</body>
</html>';