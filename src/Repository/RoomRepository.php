<?php

namespace App\Repository;

use App\Model\Room;
use App\System\Database\Connection;
use PDO;
use IOHandlerInterface;

class RoomRepository implements IOHandlerInterface
{
    protected ?Connection $connection = null;
    protected string $table = "room";
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    /**
     * @param Room $room
     * @return bool
     */
    public function save($room): bool
    {
        $statement = $this->connection->prepare(
            "
            INSERT INTO $this->table (name, floor) VALUES ( :name, :floor
            );"
        );
        return $statement->execute((array) $room);
    }

    /**
     * @return false|Room[]
     */
    public function readAll(): false|array
    {
        return $this->connection->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_OBJ);
    }
}