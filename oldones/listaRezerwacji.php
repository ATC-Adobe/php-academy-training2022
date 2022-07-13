<?php

include("reservation_class.php");

$dbConnection = MysqlConnection::getInstance();

$bb = new ReservationService;

$query = "SELECT * FROM room WHERE email='".$_POST['email']."'";

if($dbConnection->query($query)->rowCount() > 0)
{
    echo "refreshed page";
}
else{$bb->addReservation();}


$tab = $bb-> readReservations();



echo '<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>reservation</title>
</head>
<body>';

echo '<table class="table table-bordered table-dark">';
foreach($tab as $el)
{
    echo '<tr>';
    echo "<td>". $el['id']."</td>
    <td>".$el['room_id']."</td>
    <td>".$el['name']."</td>
    <td>".$el['surname']."</td>
    <td>".$el['email']."</td>
    <td>".$el['start']."</td>
    <td>".$el['end']."</td>";
    echo '</tr>';
}
echo '</table>';
echo ' </table>
</body>
</html>';

