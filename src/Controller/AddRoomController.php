<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;

class AddRoomController {
    public function __construct() { }

    #[NoReturn] public function makeRequst() : void {
        if(isset($_POST['room_name'])) {

            $roomRepository = new RoomConcreteRepository();

            $room = new RoomModel(
                0,
                $_POST['room_name'],
                intval($_POST['floor'])
            );

            $roomRepository
                ->addRoom($room);

            // TODO redirect
            header('Location: roomReservationListing.php?status=1');
            die();
        }
        header('Location: roomReservationListing.php?status=1');
        die();
    }
}