<?php

    namespace Controller\Room;
    use Room\Service\RoomService;

    class AddRoomController {
        public function request(): void {
            if (isset($_POST['name']) && isset($_POST['floor'])) {
                $service = new RoomService();
                $service->addRoom();
            }
        }
    }