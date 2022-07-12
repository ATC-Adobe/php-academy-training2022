<?php

namespace App\Controller;

use App\Model\Room;
use App\Service\RoomService;
use App\View\RoomForm;
use App\View\RoomList;

class RoomController
{
    public function index(string $msg = ''): void
    {
        (new RoomList())->render($msg);
    }
    public function store(): void
    {
        $roomService = new RoomService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room = new Room();
            $room->name = htmlentities($_POST["name"]);
            $room->floor = htmlentities($_POST["floor"]);

            $ok = $roomService->addRoom($room);
            if(!$ok) {
                $msg = '<div class="alert alert-danger text-center">Something went wrong. Try again!</div>';
            } else {
                $msg = '<div class="alert alert-success text-center">Successfully added room!</div>';
            }
            $this->index($msg);
        } else {
            echo "Unknown Method";
        }
    }
    public function create(): void
    {
        (new RoomForm())->render();
    }
}
