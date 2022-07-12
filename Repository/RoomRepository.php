<?php

namespace App\Repository;

use App\Model\RoomModel;
use App\System\Database\Connection;
use PDO;

class RoomRepository
{
    protected ?Connection $connection = null;
    protected $table = "room";
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }
    public function save(RoomModel $room): bool
    {
        $statement = $this->connection->prepare(
            "
            INSERT INTO $this->table (name, floor) VALUES ( :name, :floor
            );"
        );
        return $statement->execute((array) $room);
    }
    public function readAll(): bool|array
    {
        return $this->connection->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_OBJ);
    }
}