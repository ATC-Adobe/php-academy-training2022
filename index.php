<?php

declare(strict_types=1);

use Controllers\Room\DisplayRooms;
use Controllers\User\LoginUser;

require_once "autoloader.php";

session_start();

require_once "layout/header.html"; ?>
<body class="index-list-body">
<?php
require_once "layout/navbar.php"; ?>

<?php
$displayRooms = new DisplayRooms();
$rooms = $displayRooms->displayRooms();

$nickName = $_SESSION['username'];

$login = new LoginUser();
$userId = $login->getUserId($nickName);
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

            <?php
            foreach ($userId as $id) : ?>
                <input type="hidden" name="userId" value="<?php
                echo $id['id']; ?>">
            <?php
            endforeach; ?>

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