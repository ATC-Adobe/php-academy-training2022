<?php

require_once "autoloader.php";
require_once "layout/header.html"; ?>
<body class="index-list-body">
<?php
require_once "layout/navbar.html"; ?>

<?php
$displayRooms = new \Controllers\DisplayRooms();
$rooms = $displayRooms->displayRooms();
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
            echo $i += 1 ?>">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </form>
    </tr>
    </tbody>
    <?php
    endforeach; ?>
</table>
</form>
<?php
require_once "layout/footer.html" ?>
</body>
</html>