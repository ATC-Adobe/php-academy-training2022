<?php

use Controllers\Room\CreateRoom;
use Session\Session;

require_once "../autoloader.php";

session_start();

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $createRoom = new CreateRoom();
    $createRoom->createRoom();

    $session = new Session();
    $session->set('roomAdded');

    header('Location:../index.php');
    exit();
}

require_once "../layout/header.html";

require_once "../layout/navbar.php";

require_once "../Form/roomForm.php";

require_once "../layout/footer.html";

