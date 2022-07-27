<?php

include("../../autoloading.php");
use User\Session;

$session = Session::getInstance();
$session->start();

use SystemDatabase\MysqlConnection;
use Reservation\ReservationService;
use Room\RoomRepository;
use Reservation\ReservationRepository;

include("../../layout/navbar.php");

$dbConnection = MysqlConnection::getInstance();

#$newRoom = new RoomService;
#$newRoom->createRoom();

if(isset($_POST['email']) || isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['startdate']) || isset($_POST['enddate']))
{
    $query = "SELECT * FROM reservation WHERE email='" . $_POST['email'] . "'";

    if($dbConnection->query($query)->rowCount() > 0)
    {
        echo "refreshed page";
    }
    else
    {
        $bb = new ReservationService;
        $bb->createResrvation();
    }
}
else
{
    echo "all reservations";
}

$tab = new \Reservation\ReservationRepository();
$tab = $tab->readReservation();


include("../../layout/bootstrap.html");

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

