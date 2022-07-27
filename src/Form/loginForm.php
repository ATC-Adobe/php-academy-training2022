<?php


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

<form method="POST" action="../../src/View/loginView.php"> <!- potem dac tu action?->

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nickname</label>
        <input type="text" name="nickname" class="form-control" id="exampleFormControlInput1" placeholder="Enter your unique nickname">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Don't forget your new password">
    </div>

    <div class="row">
        <div class="col">
            <input type="submit" value="login" class="btn btn-success btn-lg btn-block">
        </div>
    </div>

</form>
