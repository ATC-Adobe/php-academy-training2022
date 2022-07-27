<?php

include("../../autoloading.php");
use User\Session;

$session = Session::getInstance();
$session->start();

include("../../layout/navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>reservation</title>
</head>
<body>

<form method="POST" action="../../index.php">

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Room name</label>
        <input type="text" name="room_name" class="form-control" id="exampleFormControlInput1" placeholder="Room_X">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Floor</label>
        <input type="text" name="floor" class="form-control" id="exampleFormControlInput1" placeholder="Floor X (enter the number X)">
    </div>

    <div class="row">
        <div class="col">
            <input type="submit" value="dodaj" class="btn btn-success btn-lg btn-block">
        </div>
    </div>

</form>

