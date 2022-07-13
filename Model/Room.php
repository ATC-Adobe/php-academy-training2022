<?php

namespace App\Model;

use ModelInterface;

class Room implements ModelInterface
{
    public int $id;
    public int $floor;
    public string $name;

    /**
     * Uses prefix room_
     * @param array $room
     * @return $this
     */
    public function fromArray(array $room)
    {
        foreach ($room as $key => $value) {
            if(str_starts_with($key, 'room')) {
                $this->{substr($key, 5)} = $value;
            }
        }
        return $this;
    }
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }
}