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
     * @return SimpleXMLElement|Room[]
     */
    public function readRooms(): array|SimpleXMLElement
    {
        $results = null;
        if($this->extension === "csv") {
            $results = $this->fileHandler->readFile($this->columns);
        }
        else {
            $results = $this->fileHandler->readFile();
        }
        if($this->extension !== "xml") {
            $results = Util::mapResultsToObjects($results);
        }
//        if(!$results) {
//            echo "Something went wrong!";
//            exit(); //Not here
//        }
        return $results;
    }

    public function addRoom(array $room) {
        $room['id']= $this->generateId();
        return $this->fileHandler->appendToFile($room);
    }
}