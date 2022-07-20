<?php
require 'autoloading.php';
//$conn = Connection::getInstance();
//$result = $conn->query("SELECT * FROM reservations")->fetchAll();
//foreach ($result as $row) {
//    $from = date("d/m/y H:i:s",strtotime($row[5]));
//    $to = date("d/m/y H:i:s",strtotime($row[6]));
//    echo "<tr>
//            <td>{$row[0]}</td>
//            <td>{$row[1]}</td>
//            <td>{$row[2]}</td>
//            <td>{$row[3]}</td>
//            <td>{$row[4]}</td>
//            <td>{$from}</td>
//            <td>{$to}</td>
//            </tr>";
//}
//$conn = Connection::getInstance();
//$result = $conn->query("SELECT reservations.*, rooms.roomName from reservations inner join rooms
//on reservations.room_id=rooms.roomID ORDER BY reservation_id ASC ;")->fetchAll();
$result = src\Reservation\Repository\ReservationRepository::getReservation()->fetchAll();
foreach ($result as $row) {
    $from = date("d/m/y H:i:s",strtotime($row[5]));
    $to = date("d/m/y H:i:s",strtotime($row[6]));
    echo "<tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[2]}</td>
            <td>{$row[3]}</td>
            <td>{$row[4]}</td>
            <td>{$from}</td>
            <td>{$to}</td>
            <td>{$row[7]}</td>
            <td><form method='post' action='reservationsList.php'><input type='hidden' name='delete' value=$row[0] /><input type='submit' value='Delete'></form>
            </tr>";
}
if(isset($_POST['delete'])){
src\Reservation\Repository\ReservationRepository::deleteReservation($_POST['delete']);
    echo "<meta http-equiv='refresh' content='0'>";
}