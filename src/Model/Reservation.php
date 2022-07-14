<?php

namespace App\Model;

use ModelInterface;

class Reservation implements ModelInterface
{
    public int $id;
    public int $room_id;
    public ?Room $room;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $start_date;
    public string $end_date;

    public function toArray(): array
    {
        $result = (array) $this;
        if(isset($this->room)) {
        $result['room'] = $this->room->id;
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