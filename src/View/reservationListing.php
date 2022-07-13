    <?php

    use System\Database\MysqlConnection;
    $db = MysqlConnection::getInstance();
    $query = "SELECT * FROM reservations";
    $result  = $db->query($query)->fetchAll();

    ?>
    <div id="content">
        <h2 class="text-light">List of all confirmed reservations</h2>

    <?php

    if (isset($_GET['reserved'])) {
        if ($_GET['reserved'] == "true") {
            echo "<h2 class='confirm'>Reservation added succesfully.</h2>";
        } else {
            echo "<h2 class='confirm'>Something went wrong, back to <a href='../../index.php' class='link-default'>room list</a>.</h2>";
        }
    }

    ?>
        <table class="table-list">
            <tr>
                <th>Reservation ID:</th>
                <th>Room ID:</th>
                <th>First name:</th>
                <th>Second name:</th>
                <th>Email:</th>
                <th>From:</th>
                <th>To:</th>
            </tr>

        <?php

        foreach($result as $r) {
            [ $reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate ] = $r;

            echo "<tr>";
            echo "<td>".$reservationId."</td>";
            echo "<td>".$roomId."</td>";
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