<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Model\Room\Model\RoomModel;
use Model\Room\Repository\RoomConcreteRepository;
use System\Router\Response;
use System\Status;
use System\Util\Authenticator;

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

        /* Not needed anymore thanks to authenticator middleware in router
        $auth = new Authenticator();

        if(!$auth->isLogged()) {
            (new Response())
                ->goTo('/');
        }*/

        $roomRepository = new RoomConcreteRepository();

        $room = new RoomModel(
            0,
            htmlentities($_POST['room_name']),
            intval($_POST['floor'])
        );

        $roomRepository
            ->addRoom($room);


        (new Response())
            ->goTo('/room/list?status='.Status::ROOM_OK);
    }
}