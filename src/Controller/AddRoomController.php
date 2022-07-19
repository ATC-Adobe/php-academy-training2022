<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;
use Router\Response;
use System\Status;
use System\Util\Session;

class AddRoomController {
    public function __construct() { }

    /**
     * Function validates room data and redirects.
     *
     * @return void
     */
    #[NoReturn] public function makeRequest() : void {

        if(!isset($_POST['room_name'])) {
            (new Response())
                ->goTo('/');
        }

        $sess = Session::getInstance();

        if($sess->get('valid') === null) {
            (new Response())
                ->goTo('/');
        }

        $roomRepository = new RoomConcreteRepository();

        $room = new RoomModel(
            0,
            $_POST['room_name'],
            intval($_POST['floor'])
        );

        $roomRepository
            ->addRoom($room);


        (new Response())
            ->goTo('/roomListing?status='.Status::ROOM_OK);
    }
}