<?php
require_once 'autoloading.php';
$conn = System\Database\Connection::getInstance();
$result = \src\Room\Repository\RoomRepository::getRoom()->fetchAll();
foreach ($result as $row) {
    echo "<tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[2]}</td>
            <td><form method='get' action='reservations.php'><input type='hidden' name='room' value=$row[1] /><input type='submit' value='Reserve'></form> </td>
            </tr>";
}
