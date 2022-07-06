<?php

include_once "./CsvHandler.php";
class RoomService
{
    protected $columns = ["id", "name", "floor"];
    public function __construct(protected string $filename = "./data/rooms.csv")
    {
    }

    public function readRooms() {
        $results = CsvHandler::readFile($this->filename, $this->columns);
        return $results;
    }
}