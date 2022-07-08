<?php

require_once "const/constants.php";

// The class JsonReservationsReader is used to load data from the json file
class JsonReservationsReader
{
    private $jsonFile;

    public function __construct()
    {
        $this->jsonFile = file_get_contents(JSON_FILE);
    }

    public function readReservations()
    {
        $reservation = [];
        $jsonContents = json_decode($this->jsonFile);
        foreach ($jsonContents as $jsonContent) {
            $reservations [] = [
                'roomId' => $jsonContent->roomId,
                'firstName' => $jsonContent->firstName,
                'lastName' => $jsonContent->lastName,
                'email' => $jsonContent->email,
                'startDay' => $jsonContent->startDay,
                'endDay' => $jsonContent->endDay,
                'startHour' => $jsonContent->startHour,
                'endHour' => $jsonContent->endHour
            ];
        }
        return $reservations;
    }
}

//echo '<pre>';
//var_dump($this->jsonFile);
//echo '</pre>';