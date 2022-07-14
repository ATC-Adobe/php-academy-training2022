    <?php

    use Reservation\Model\ReservationModel;
    use Reservation\Repository\ReservationRepository;
    use Controller\DeleteReservationController;

    $reservationRepository  = new ReservationRepository();
    $reservation            = $reservationRepository ->getAllReservations();

    if (isset($_POST['id'])) {
        (new DeleteReservationController())->request();
    }

    ?>
    <div id="content">
        <h2 class="text-light">List of all confirmed reservations</h2>

    <?php

    if (isset($_GET['reserved'])) {
        if ($_GET['reserved'] == "true") {
            echo "<h5 class='confirm'>Reservation added succesfully.</h5>";
        } else {
            echo "<h5 class='confirm'>Something went wrong, back to <a href='../../index.php' class='link-default'>room list</a>.</h5>";
        }
    }

    if (isset($_GET['deleted'])) {
        if ($_GET['deleted'] == "true") {
            echo "<h5 class='confirm'>Reservation removed succesfully.</h5>";
        } else {
            echo "<h5 class='confirm'>Something went wrong while deleting reservation.</h5>";
        }
    }

    ?>
        <table class="table-list">
            <tr>
                <th>Reservation ID:</th>
                <th>Room:</th>
                <th>First name:</th>
                <th>Second name:</th>
                <th>Email:</th>
                <th>From:</th>
                <th>To:</th>
                <th>Action:</th>
            </tr>

        <?php

        foreach ($reservation as $r) {
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
                    <form method='POST' action='reservationList.php'>
                        <label><input type='hidden' name='id' value='".$reservationId."' /></label>
                        <label><button type='submit' class='btn-submit'>Delete</button></label>
                    </form>
                </td>";
            echo "</tr>";
            }
        ?>

            <tr>
                <td colspan="8">...</td>
            </tr>
        </table>

        <form method="POST" action=""></form>
    </div>