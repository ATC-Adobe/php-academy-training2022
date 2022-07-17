<?php

require_once "../autoloader.php";
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $createRoom = new \Controllers\Room\CreateRoom();
    $createRoom->createRoom();

    header('Location:../index.php');
}
?>
<?php
require_once "../layout/header.html" ?>
<?php
require_once "../layout/navbar.html" ?>

<?php
require_once "../Form/roomForm.php" ?>
<?php
require_once "../layout/footer.html" ?>

