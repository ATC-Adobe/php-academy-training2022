<?php
require 'autoloading.php';
use src\Reservation\Repository\ReservationRepository;
include_once 'src/Reservation/Repository/ReservationRepository.php';
use src\Reservation\Model\ReservationModel;
include_once 'src/Reservation/Model/ReservationModel.php';

$userID=$_SESSION['userID'];
$result = src\Reservation\Repository\ReservationRepository::myReservation($userID)->fetchAll();
foreach ($result as $row) {
    $from = date("d/m/y H:i:s",strtotime($row[3]));
    $to = date("d/m/y H:i:s",strtotime($row[4]));
    echo "<tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[2]}</td>
            <td>{$from}</td>
            <td>{$to}</td>
            <td><form method='post' action='reservationsList.php'><input type='hidden' name='delete' value=$row[0] /><input type='submit' value='Delete'></form>
            </tr>";
}