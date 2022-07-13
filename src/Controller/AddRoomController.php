<?php

    namespace Controller;

    use Exception;
    use Room\Service\RoomService;


    if (isset($_POST['name']) && isset($_POST['floor'])) {
        try {
            $request = new RoomService();
            $request->addRoom();
            header("Location: ./room.php?confirmed=true");
        } catch (Exception $e) {
            echo $e;
            header("Location: ./room.php?confirmed=false");
        }
    }

    if (isset($_GET['confirmed'])) {
        if ($_GET['confirmed'] === 'true') {
            echo "<h2 class='confirm'>Room added successfully.</h2>";
        } else {
            echo "<h2 class='confirm'>Something went wrong while adding room.</h2>";
        }
    }