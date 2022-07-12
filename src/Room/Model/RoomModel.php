<?php

namespace Room\Model;

class RoomModel {
    private int $id;
    private string $name;
    private int $floor;

    public function __construct(
        int $id, string $name, int $floor
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->floor = $floor;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getFloor() : int {
        return $this->floor;
    }
}