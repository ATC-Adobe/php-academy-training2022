<?php

declare(strict_types=1);

use Controllers\Room\DisplayRooms;
use Controllers\User\LoginUser;

require "./vendor/autoload.php";

session_start();

require_once "layout/header.html"; ?>
<body class="index-list-body">
<?php
require_once "layout/navbar.php";

if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-info message" role="alert">
        <?php
        echo $_SESSION['message']; ?>
    </div>
    <?php
    unset($_SESSION['message']);
endif;

$displayRooms = new DisplayRooms();
$rooms = $displayRooms->displayRooms();

if (isset($_SESSION['username'])){
    $nickName = $_SESSION['username'];

    $login = new LoginUser();
    $userId = array_unique($login->getUserId($nickName));
}
?>

<table class="table">
    <thead id="reservation-head">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Numer Sali</th>
        <th scope="col">Piętro</th>
        <th scope="col">Możliwa Akcja</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($rooms

    as $i => $room) : ?>

    <tr id="reservation-list">
        <form action="View/create.php" method="GET">
            <th scope="row"><?php
                echo $i + 1 ?></th>
            <td class="table-td"><?php
                echo 'Sala ' . $room['roomNumber']; ?></td>

            <td class="table-td"><?php
                echo $room['floorNumber']; ?></td>
            <input type="hidden" name="roomId" value="<?php
            echo $room['id']; ?>">

            <input type="hidden" name="roomNumber" value="<?php
            echo $room['roomNumber']; ?>">

            <input type="hidden" name="userId" value="<?php
            echo $userId['id']; ?>">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </form>
    </tr>
    </tbody>
    <?php
    endforeach; ?>
</table>
<?php
require_once "layout/footer.html" ?>
</body>