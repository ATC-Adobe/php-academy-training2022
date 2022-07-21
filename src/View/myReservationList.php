<?php
    use Reservation\Model\ReservationModel;
    use Reservation\Repository\ReservationRepository;

    $repo     = new ReservationRepository();
    $reservations = $repo->getReservationByUserId($session->get('user_id'));

    ?>
<h2 class="text-center">List of your reservations</h2>
<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">Reservation ID:</th>
        <th scope="col">Room:</th>
        <th scope="col">First name:</th>
        <th scope="col">Second name:</th>
        <th scope="col">Email:</th>
        <th scope="col">From:</th>
        <th scope="col">To:</th>
        <th scope="col">Action:</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($reservations as $r) {
        if (!$r instanceof ReservationModel) {
            die();
        }

        $reservationId  = $r->getReservationId();
        $roomName       = $r->getRoom()->getName();
        $firstName      = $r->getFirstName();
        $lastName       = $r->getLastName();
        $email          = $r->getEmail();
        $startDate      = $r->getStartDate()->format("d/m/Y H:i:s");
        $endDate        = $r->getEndDate()->format("d/m/Y H:i:s");

        echo "<tr>";
        echo "<td>".$reservationId."</td>";
        echo "<td>".$roomName."</td>";
        echo "<td>".$firstName."</td>";
        echo "<td>".$lastName."</td>";
        echo "<td>".$email."</td>";
        echo "<td>".$startDate."</td>";
        echo "<td>".$endDate."</td>";
        echo "<td>
                    <form method='POST' action='./reservationList.php'>
                        <label><input type='hidden' name='id' value='".$reservationId."' /></label>
                        <label><button type='submit' class='btn btn-danger'>Delete</button></label>
                    </form>
                </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>