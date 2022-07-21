<?php

namespace Controller;

use Repository\RoomRepository;
use Repository\RoomFormValidation;
use Service\ApplicationService;

class CreateRoomController
{
    public function createRoom(string $error, string $name, string $floor): array
    {
        if (isset($_POST['submit'])) {
            [$error, $name, $floor] = (new RoomFormValidation())->validated($error, $name, $floor);
            if ($error == '') {
                (new RoomRepository('$room_id', 'name', 'floor'))->storeRoom($name, $floor);
            }
        }
        return array($error, $name, $floor);
    }
}