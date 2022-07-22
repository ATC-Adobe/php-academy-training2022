<?php

namespace App\Controller;

use App\Model\Room;
use App\Service\AuthenticatorService;
use App\Service\RoomService;
use App\View\RoomForm;
use App\View\RoomList;

class RoomController
{
    public function index(string $alertMsg = '', string $type = "danger"): void
    {
        $rooms = (new RoomService())->readRooms();
        (new RoomList($rooms, $alertMsg, $type))->render();
    }

    public function store(): void
    {
        (new AuthenticatorService())->isNotAuthRedirect();
        $roomService = new RoomService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room = new Room();
            $room->name = htmlentities($_POST["name"]);
            $room->floor = htmlentities($_POST["floor"]);

            if(!is_numeric($room->floor)) {
                $this->create("Floor must be a number");
            }

            $ok = $roomService->addRoom($room);
            if (!$ok) {
                $msg = 'Something went wrong. Try again!';
                $type = "danger";
            } else {
                $msg = 'Successfully added room!';
                $type = "success";
            }
            $this->index(alertMsg: $msg, type: $type);
        } else {
            echo "Unknown Method";
        }
    }

    public function create(string $msg = ""): void
    {
        (new AuthenticatorService())->isNotAuthRedirect();
        (new RoomForm())->render($msg);
    }
}
