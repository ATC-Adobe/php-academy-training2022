<?php

include("../../autoloading.php");
use User\Session;
use Room\RoomRepository;
use Reservation\ReservationRepository;


$session = Session::getInstance();
$session->start();

include("../../layout/navbar.php");

$tab = new ReservationRepository();
$tab = $tab->showUserReservations($_SESSION['user_id']);

echo '
<body>';

echo '<table class="table table-bordered table-dark">';

echo '<thead><tr>
        <th scope="col">id</th>
        <th scope="col">room id</th>
        <th scope="col">room name</th>
        <th scope="col">firstname</th>
        <th scope="col">lastname</th>
        <th scope="col">email</th>
        <th scope="col">start date</th>
        <th scope="col">end date</th>
        <th scope="col">delete</th>
    </thead></tr>';

echo '<tbody>';

$temp = new RoomRepository;

foreach($tab as $el)
{
    echo '<tr>';
    echo "<td>". $el['id']."</td>
    <td>".$el['room_id']."</td>
    <td>".$temp->roomNameById($el['room_id'])."</td>
    <td>".$el['name']."</td>
    <td>".$el['surname']."</td>
    <td>".$el['email']."</td>
    <td>".$el['start']."</td>
    <td>".$el['end']."</td>";


    echo ' <td><form method = "post"><button type="submit" name="delete" class="btn btn-danger" value='.$el['id'].'>Delete</button></form></td>';

    if(array_key_exists('delete', $_POST)) {
        $deleted = new ReservationRepository;
        $deleted->deleteReservation($el['id']);
        break;
    }

    echo '</tr>';
}



echo '</tbody>';
echo '</table>';
echo ' </table>
</body>
</html>';