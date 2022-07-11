<?php

require_once "const/constants.php";

class Validations
{
    private $checkRooms;

// Validation of a positively booked room
    public function successMessage($roomId)
    {
        echo "Sala $roomId została zarezerwowana";
    }
}