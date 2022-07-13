<?php

include("reservation_class.php");
#include("ConnectionClass.php");

echo "<h1><strong>".$_GET['room']."</strong></h1>";


echo '<!DOCTYPE html>
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

<form method="POST" action="listaRezerwacji.php">
    <div class="row">
        <div class="col">
            <input type="text" placeholder="Imie" name="firstname" class="form-control"/>
        </div>
        <div class="col">
            <input type="text" name="lastname" class="form-control" placeholder="Nazwisko">
        </div>
    </div>
	<div class="row">
        <div class="col">
            <input type="text" name="email" class="form-control" placeholder="email">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="datetime-local" name="startdate" class="form-control" placeholder="od DD/MM/RRRR godzina 00:00:00">
        </div>
        <div class="col">
            <input type="datetime-local" name="enddate" class="form-control" placeholder="do DD/MM/RRRR godzina 00:00:00">
        </div>
    </div>
	<div class="row">
		<div class="col">
			<input type="hidden" name="reservation_id" value="'.$_GET['room'].'">
			<input type="submit" value="zarezerwuj" class="btn btn-success btn-lg btn-block">
		</div>
	</div>
</form>



</body>
</html>';


