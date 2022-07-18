<?php

namespace Controller\Room;
use Room\Service\RoomService;

class DeleteRoomController {
    public function request(): void {
        if (isset($_POST['id'])) {
            $service = new RoomService();
            $service->deleteRoom();
            header ("Location: ./index.php?roomDelete=true");
            die();
        }
        header ("Location: ./index.php?roomDelete=false");
        die();
    }
}