<?php

include("../../autoloading.php");

use SystemDatabase\MysqlConnection;
use Reservation\ReservationService;
use Room\RoomService;

include("../../layout/navbar.html");

$dbConnection = MysqlConnection::getInstance();

$newRoom = new RoomService;
$newRoom->createRoom();

if(isset($_POST['email']) || count($_POST) > 0)
{
    $query = "SELECT * FROM room WHERE email='" . $_POST['email'] . "'";

    if($dbConnection->query($query)->rowCount() > 0)
    {
        echo "refreshed page";
    }
    else if(count($_POST) > 0)
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

