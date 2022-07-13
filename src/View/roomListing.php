<?php

    use System\Database\MysqlConnection;
    $db = MysqlConnection::getInstance();
    $query = "SELECT * FROM rooms";
    $result  = $db->query($query)->fetchAll();

?>
    <div id="content">
        <h2 class="text-light">Select a room to book</h2>
        <table class="table-list">
            <tr>
                <th>Room ID:</th>
                <th>Room name:</th>
                <th>Floor:</th>
                <th></th>
            </tr>
<?php

    foreach ($result as $r) {
        [ $roomId, $name, $floor ] = $r;

        echo "<tr>";
        echo "<td>".$roomId."</td>";
        echo "<td>".$name."</td>";
        echo "<td>".$floor."</td>";
        echo "<td>
                                    <form method='GET' action='./reservation.php'>
                                        <input type='hidden' name='roomId' value='".$roomId."'>
                                        <input type='hidden' name='name' value='".$name."'>
                                        <button class='btn-submit'>Reserve</button>
                                    </form>
                                    </td>";
        echo "</tr>";
    }

?>
            <tr>
                <td colspan="4">...</td>
            </tr>
        </table>
    </div>