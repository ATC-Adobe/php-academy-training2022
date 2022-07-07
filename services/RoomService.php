<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class RoomService extends BasicService
{
    protected $columns = ["id", "name", "floor"];
    public function __construct(string $filename = "./data/rooms.json")
    {
        parent::__construct($filename);
    }

    /**
     * @return bool|SimpleXMLElement|Room[]
     */
    public function readRooms(): array|SimpleXMLElement
    {
        $results = null;
        if($this->extension === "csv") {
            $results = $this->reader->readFile($this->columns);
        }
        else {
            $results = $this->reader->readFile();
        }
        if($this->extension !== "xml") {
            $results = Util::mapResultsToObjects($results);

        }

        if(!$results) {
            echo "Something went wrong!";
            exit(); //Not here
        }
        return $results;
    }

    public function addRoom() {
    //
    }


}