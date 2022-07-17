<?php

use Database\Connection;
use Repository\Room;

require_once '../../autoloading.php';

if (count($_POST) > 0) {
    $room = new Room();
    $room->addRoom();
}

header('Location: http://localwsl.com/');
