<?php

namespace App\Model;

use ModelInterface;

class Reservation implements ModelInterface
{
    public int $id;
    public int $room_id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $start_date;
    public string $end_date;
}