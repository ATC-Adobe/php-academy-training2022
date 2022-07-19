<?php

namespace App\Model;

use ModelInterface;

class Room implements ModelInterface
{
    public int $id;
    public int $floor;
    public string $name;

    /**
     * For fetching alongside reservations!
     * Uses prefix room_
     * @param array $room
     * @return $this
     */
    public function fromArrayPrefix(array $room): static
    {
        foreach ($room as $key => $value) {
            if(str_starts_with($key, 'room')) {
                //prefix room_[actual key]
                $this->{substr($key, 5)} = $value;
            }
        }
        return $this;
    }
    public function toArray(): array
    {
        return (array) $this;
    }
    public function fromArray(array $room): static
    {
        foreach ($room as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }
}