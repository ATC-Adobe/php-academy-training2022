<?php

namespace Repository;

use Controller\CreateRoomController;
use Service\ValidationMessages;

class RoomFormValidation extends CreateRoomController
{
    public function validated(string $error, mixed $name, mixed $floor): array
    {
        (new ValidationMessages())->validationsMsg();
        if (empty($_POST['name'])) {
            $error .= ROOM_NAME_REQUIRED . '<br>';
        } elseif (htmlspecialchars(stripcslashes($_POST['name']))) {
            $error .= RESTRICTED_CHARACTERS;
        } elseif (strlen($_POST['name']) > 50) {
            $error .= ROOM_FIELD_50_CHARACTERS . '<br>';
        } elseif (!preg_match("/^[a-zA-Z\d_ ]*$/", ($_POST['name']))) {
            $error .= ROOM_CHARACTERS . '<br>';
        } else {
            $name = $_POST['name'];
        }
        if (empty($_POST['floor'])) {
            $error .= FLOOR_REQUIRED . '<br>';
        } elseif (htmlspecialchars(stripcslashes($_POST['floor']))) {
            $error .= RESTRICTED_CHARACTERS;
        } elseif (strlen($_POST['floor']) > 3) {
            $error .= FLOOR_FIELD_3_CHARACTERS . '<br>';
        } elseif (!preg_match("/^[\d ]*$/", ($_POST['floor']))) {
            $error .= FLOOR_CHARACTERS . '<br>';
        } else {
            $floor = $_POST['floor'];
        }
        return array($error, $name, $floor);
    }
}