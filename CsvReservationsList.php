<?php

require_once "class/CsvReservationService.php";
require_once "class/CsvReservationsReader.php";
require_once "class/Validations.php";

// The class CsvReservationService is used to save data from the form to a csv file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationService = new CsvReservationService();
    $reservationService->createReservation(
        $_POST['roomId'],
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['startDay'],
        $_POST['endDay'],
        $_POST['startHour'],
        $_POST['endHour']
    );

    $roomId = $_POST['roomId'];
}
?>

<?php
require_once "layouts/header.html"; ?>
<body class="index-list-body">
<?php
require_once "layouts/navbar.html"; ?>

<div id="success-message">
    <?php

    if (!empty($_POST)) {
        $successMessage = new Validations();
        $successMessage->successMessage($roomId);
    }
    ?>
</div>

<?php
// The class CsvReservationsReader is used to load data from the csv file
$reservationReader = new CsvReservationsReader();
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
    <?php
    foreach ($reservations

    as $i => $reservation) : ?>
    <tr class="list-tbody">
        <th scope="row"><?php
            echo $i + 1 ?></th>
        <td><?php
            echo $reservation['roomId']; ?></td>
        <td><?php
            echo $reservation['firstName']; ?></td>
        <td><?php
            echo $reservation['lastName']; ?></td>
        <td><?php
            echo $reservation['email']; ?></td>
        <td><?php
            echo $reservation['startDay']; ?></td>
        <td><?php
            echo $reservation['endDay']; ?></td>
        <td><?php
            echo $reservation['startHour']; ?></td>
        <td><?php
            echo $reservation['endHour']; ?></td>
    </tr>
    </tbody>
    <?php
    endforeach; ?>
</table>
<?php
require_once "layouts/footer.html" ?>
</body>
</html>