<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;
use Router\Response;

class AddRoomController {
    public function __construct() { }

    #[NoReturn] public function makeRequest() : void {
        if(isset($_POST['room_name'])) {

            $roomRepository = new RoomConcreteRepository();

            $room = new RoomModel(
                0,
                $_POST['room_name'],
                intval($_POST['floor'])
            );

            $roomRepository
                ->addRoom($room);

        }
        if(__ROUTER) {
            (new Response())
                ->goTo('/roomListing');
        }
        else {
            header('Location: roomListing.php');
            die();
        }
    }
}