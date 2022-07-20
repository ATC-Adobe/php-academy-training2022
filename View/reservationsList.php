<?php

use Controllers\Reservation\DisplayReservations;

require_once "../autoloader.php";

session_start();

require_once "../layout/header.html" ?>
<body class="index-list-body">
<?php
require_once "../layout/navbar.php" ?>

<?php
$displayReservations = new DisplayReservations();
$reservations = $displayReservations->displayReservations();
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
        <th scope="col">Data zakończenia rezerwacji</th>
        <th scope="col">Godzina Rozpoczęcia rezerwacji</th>
        <th scope="col">Godzina zakończenia rezerwacji</th>
        <th scope="col">Możliwa czynność</th>
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
            echo $reservation['roomNumber']; ?></td>
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
        <td>
            <a href="update.php?id=<?php
            echo $reservation['id'] ?>" class="btn btn-sm btn-info">Edytuj</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php
                echo $reservation['id'] ?>">
                <button type="submit" class="btn btn-sm btn-danger">Usuń</button>
            </form>
        </td>
    </tr>
    </tbody>
    <?php
    endforeach; ?>
</table>
<?php
require_once "../layout/footer.html"; ?>
</body>