<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>Lista Rezerwacji</title>
</head>
<body id="list-body">

<a class="btn return" href="index.php">Wróć do Listy Sal</a>

<div id="success-message">
    Rezerwacja została dodana
</div>

<?php
require_once "ReservationReader.php";

// The class ReservationReader is used to load data from the csv file
$reservationReader = new ReservationReader();
$reservations = $reservationReader->readReservations();
?>

<table class="table">
    <thead id="reservated-head">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Numer Sali</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Adres E-mail</th>
        <th scope="col">Data rozpoczęcia rezerwacji</th>
        <th scope="col">Godzina rozpoczęcia rezerwacji</th>
        <th scope="col">Data zakończeniaia rezerwacji</th>
        <th scope="col">Godzina zakończenia rezerwacji</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reservations as $i => $reservation) : ?>
    <tr class="list-tbody">
        <th scope="row"><?php echo $i + 1?></th>
        <td ><?php echo $reservation['room_id']; ?></td>
        <td><?php echo $reservation['firstname']; ?></td>
        <td><?php echo $reservation['lastname']; ?></td>
        <td><?php echo $reservation['email']; ?></td>
        <td><?php echo $reservation['startday']; ?></td>
        <td><?php echo $reservation['endday']; ?></td>
        <td><?php echo $reservation['starthour']; ?></td>
        <td><?php echo $reservation['endhour']; ?></td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>
</body>
</html>