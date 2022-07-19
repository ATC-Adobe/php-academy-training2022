<?php
use Controllers\Room\CreateRoom;

require_once "../autoloader.php";

session_start();

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $createRoom = new CreateRoom();
    $createRoom->createRoom();

    header('Location:../index.php');
}
?>
<?php
require_once "../layout/header.html" ?>
<?php
require_once "../layout/navbar.php" ?>

<?php
require_once "../Form/roomForm.php" ?>
<?php
require_once "../layout/footer.html" ?>

