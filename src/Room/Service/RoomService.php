<?php
namespace Room\Service;

use Room\Model\RoomModel;
use Room\Repository\RoomRepository;

class RoomService {
    public function __construct() {}

    public function addRoom(): void {
        $id = 0;
        $name = htmlspecialchars($_POST['name']);
        $floor = htmlspecialchars(($_POST['floor']);

        $room = new RoomModel($id, $name, $floor);
        $repo = new RoomRepository();

        $repo->addRoom($room);
    }

    public function deleteRoom(): void {
        $id = $_POST['id'];

        $repo = new RoomRepository();
        $repo->deleteRoom($id);
    }
}