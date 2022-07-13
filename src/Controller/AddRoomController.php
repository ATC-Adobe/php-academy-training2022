<?php

    namespace Controller;

    use Room\Model\RoomModel;
    use Room\Service\RoomService;

    class AddRoomController {
        public function __construct() { }

        public function addRoom() :void {
            $id     = 0;
            $name   = $_POST['name'];
            $floor  = $_POST['floor'];

            $room = new RoomModel($id, $name, $floor);
            $roomService = new RoomService();

            $roomService->addRoom($room);
        }
    }