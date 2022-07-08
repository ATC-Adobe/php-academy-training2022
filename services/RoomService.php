<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class RoomService extends BasicService
{
    protected $columns = ["id", "name", "floor"];
    public function __construct(string $filename = "./data/rooms.json")
    {
        parent::__construct($filename, $this->columns, "room");
    }

    /**
     * @return iterable<Room>|false
     */
    public function readRooms(): mixed
    {
        return $this->fileHandler->readFile();
    }

    public function addRoom(array $room) {
        $room['id']= $this->generateId();
        return $this->fileHandler->appendToFile($room);
    }
}