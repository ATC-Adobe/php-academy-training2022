<?php

include("../../autoloading.php");
use User\Session;

$session = Session::getInstance();
$session->start();

if(isset($_SESSION['nickname']))
{
    #echo '<td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value='.$_GET['room_id'].'/><input type="hidden" name="room_name" value="'.$_GET['room_name'].'"/><input type="hidden" name="floor" value="'.$_GET['floor'].'"/></form></td>';
    $_SESSION['room_id'] = $_GET['room_id'];
    $_SESSION['room_name'] = $_GET['room_name'];
    $_SESSION['floor'] = $_GET['floor'];
    header("Location: http://localwsl.com/src/Form/formularz.php");
}
else
{
    include("../../layout/navbar.php");
    echo "<h1 style=\"color:red\">You must be logged in to add reservations</h1>";
}

