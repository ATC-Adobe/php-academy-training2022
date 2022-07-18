<?php

namespace Room\Model;

class RoomModel {
    private int $id;
    private string $name;
    private int $floor;

    /**
     * Default constructor
     *
     * @param int $id
     * @param string $name
     * @param int $floor
     */
    public function __construct(
        int $id, string $name, int $floor
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->floor = $floor;
    }

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getFloor() : int {
        return $this->floor;
    }
}