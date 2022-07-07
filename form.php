<?php
require_once "ReservationService.php";

// The class ReservationService is used to save data from the form to a csv file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationService = new  ReservationService();
    $reservationService->createReservation($_POST['room_id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['startday'], $_POST['endday'], $_POST['starthour'], $_POST['endhour']);

    header('Location:list.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>Formularz Rezerwacji</title>
</head>
<body id="form-body">

<a class="btn return" href="index.php">Wróć do Listy Sal</a>

<div id="room-name">
    <?php

    // Printing Room Id from the previous file
    $id = $_GET['room_id'];
    echo "Wybrano Salę $id";
    ?>
</div>

<form action="form.php" method="post" enctype="multipart/form-data" id="form">

<!--    Transfer Room Id from the form to a csv file by php echo command-->
    <input type="hidden" name="room_id" value="<?php echo $_GET['room_id'] ?>">
    <div class="input-group f-input">
        <span class="input-group-text">Imię</span>
        <input type="text" name="firstname" placeholder="Imię" aria-label="First name" class="form-control" pattern="[a-zA-Z]{1,}" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Nazwisko</span>
        <input type="text" name="lastname" placeholder="Nazwisko" aria-label="Last name" class="form-control" pattern="[a-zA-Z]{1,}" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Adres E-Mail</span>
        <input type="email" name="email" placeholder="Adres E-mail" aria-describedby="emailHelp" class="form-control" required>
    </div>

    <div class="input-group">
        <span class="input-group-text">Wybierz dzień rozpoczęcia rezerwacji</span>
        <input type="date" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" name="startday">
        <span class="input-group-text">Wybierz dzień zakończenia rezerwacji</span>
        <input type="date" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" name="endday">
    </div>

    <h4>Sale można rezerwować od Poniedziałku do Piątku</h4>

    <div class="input-group">
        <span class="input-group-text">Wybierz godzinę rozpoczęcia rezerwacji</span>
        <input type="time" name="starthour" min="08:00" max="15:00" required>
        <span class="input-group-text">Wybierz godzinę zakończenia rezerwacji</span>
        <input type="time" name="endhour" min="09:00" max="16:00" required>
    </div>

    <h4>Sale można rezerwować od 8:00 do 16:00</h4>

    <button type="submit" class="btn btn-info">Zapisz</button>
</form>
</body>
</html>