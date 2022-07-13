<?php

namespace Repository;

class RoomFormValidation
{
    function validated(string $error, mixed $name, mixed $floor): array
    {
        if (empty($_POST['name'] && strlen($_POST['name']) < 50)) {
            $error .= '<p class="text-danger">Name is required.</p>';
        } else {
            $name = $_POST['name'];
        }
        if (empty($_POST['floor'] && strlen($_POST['floor']) < 3)) {
            $error .= '<p class="text-danger">Floor is required.</p>';
        } else {
            $floor = $_POST['floor'];
        }
        return array($error, $name, $floor);
    }
}