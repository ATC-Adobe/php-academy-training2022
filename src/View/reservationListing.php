    <?php

    use Reservation\Model\ReservationModel;
    use Controller\DeleteReservationController;
    use System\File\FileReader;

    $instance = new FileReader();
    $data = $instance->read('db');

    if (isset($_POST['id'])) {
        (new DeleteReservationController())->request();
    }

    ?>
    <div id="content">
        <h2 class="text-light">List of all confirmed reservations (Database)</h2>

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

        foreach ($data as $d) {
            if (!$d instanceof ReservationModel) {
                die();
            }

            $reservationId  = $d->getReservationId();
            $roomName       = $d->getRoom()->getName();
            $firstName      = $d->getFirstName();
            $lastName       = $d->getLastName();
            $email          = $d->getEmail();
            $startDate      = $d->getStartDate()->format("d/m/Y H:i:s");
            $endDate        = $d->getEndDate()->format("d/m/Y H:i:s");

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

        <h2 class="text-light">List of all confirmed reservations (Csv)</h2>
        <table class="table-list">
            <tr>
                <th>Reservation ID:</th>
                <th>Room:</th>
                <th>First name:</th>
                <th>Second name:</th>
                <th>Email:</th>
                <th>From:</th>
                <th>To:</th>
            </tr>
        <?php

        $data = $instance->read('csv', './src/System/Data/reservations.csv');

        foreach ($data as $d) {

            [ $reservationId , $roomName, $firstName, $lastName, $email, $startDate, $endDate ] = $d;

            echo "<tr>";
            echo "<td>".$reservationId."</td>";
            echo "<td>".$roomName."</td>";
            echo "<td>".$firstName."</td>";
            echo "<td>".$lastName."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$startDate."</td>";
            echo "<td>".$endDate."</td>";
            echo "</tr>";
            }

        ?>
            <tr>
                <td colspan="7">...</td>
            </tr>
        </table>

    </div>