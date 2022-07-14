<?php

    namespace Controller;

    use Room\Service\RoomService;

    class AddRoomController {

        public function request() :void {
            if (isset($_POST['name']) && isset($_POST['floor'])) {
                $roomService = new RoomService();
                $roomService->addRoom();
                header("Location: ./room.php?confirmed=true");
                die();
            }
            header("Location: ./room.php?confirmed=false");
            die();
        }
    }