<?php

namespace Controller;

use Repository\RoomService;
use Repository\RoomValidation;

class CreateRoomController
{
    function createRoom(string $error, string $name, string $floor): array
    {
        if (isset($_POST['submit'])) {
            [$error, $name, $floor] = (new RoomValidation())->validated($error, $name, $floor);
            if ($error == '') {
                (new RoomService())->storeRoom($name, $floor);
            }
        }
        return array($error, $name, $floor);
    }
}