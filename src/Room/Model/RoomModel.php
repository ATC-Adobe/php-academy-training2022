<?php
namespace src\Room\Model;
use http\Exception\BadQueryStringException;
use src\Reservation\Repository\RoomRepository;

class RoomModel{
    public string $roomName;
    public string $floor;

    public function __construct(string $roomName, string $floor){
        $this->roomName = $roomName;
        $this->floor = $floor;
    }

    function set_roomName($roomName) {
        $this->roomName = $roomName;
    }
    function get_roomName() {
        return $this->roomName;
    }

    function set_floor($floor) {
        $this->floor = $floor;
    }
    function get_floor() {
        return $this->floor;
    }

}
