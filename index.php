<?php

#session_start();
#if(!empty($_SESSION['nickname']))
#{
    #echo 'ELOOO';
    #echo($_SESSION['nickname']);
#}



include("autoloading.php");
use Room\RoomRepository;
use Room\RoomService;
use User\Session;

$session = Session::getInstance();
$session->start();

#header('Access-Control-Allow-Origin: *');
#header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');

include("layout/navbar.php");
include("layout/bootstrap.html");


echo '
<body>
<table class="table table-bordered table-dark">
    <thead>
    <tr>
        <th scope="col">room_id</th>
        <th scope="col">name</th>
        <th scope="col">floor</th>
        <th scope="col">zarezerwuj</th>
    </tr>
    </thead>';


$newRoom = new RoomService;
$newRoom->createRoom();

$tab = new RoomRepository;
$tab = $tab->readRoom();


echo '<tbody>';
foreach($tab as $el)
{
    echo '<tr>';
    echo "<td>". $el['id']."</td>
    <td>".$el['room_name']."</td>
    <td>".$el['floor']."</td>";

    $roomNumber = $el['room_name'];
    $roomNumber = substr($roomNumber, 5, 4);

    echo '<td><form method="get" action="../src/Controller/read.php"><input type="hidden" name="room_id" value='.$el['id'].'/><input type="hidden" name="room_name" value="'.$el['room_name'].'"/><input type="hidden" name="floor" value="'.$el['floor'].'"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>';
    echo '</tr>';


}

echo "</tbody>
</table>
</body>
</html>";