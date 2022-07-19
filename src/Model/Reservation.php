<?php

namespace App\Model;

use ModelInterface;

class Reservation implements ModelInterface
{
    public int $id;
    public int $room_id;
    public int $user_id;
    public ?Room $room;
    public ?User $user;
    public string $start_date;
    public string $end_date;

    /**
     * Hides room and user models
     * @return array
     */
    public function toArray(): array
    {
        $result = (array) $this;
        if(isset($this->room)) {
        $result['room'] = $this->room->id;
        }
        if(isset($this->room)) {
            $result['user'] = $this->user->id;
        }
        return $result;
    }
    public function fromArray(array $reservation): static
    {
        foreach ($reservation as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }
}