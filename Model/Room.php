<?php

namespace App\Model;

use ModelInterface;

class Room implements ModelInterface
{
    public int $id;
    public int $floor;
    public string $name;
}