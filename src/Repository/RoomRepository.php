<?php

namespace App\Repository;

use App\Model\Room;
use App\System\Database\Connection;
use PDO;
use IOHandlerInterface;

class RoomRepository extends BaseRepository implements IOHandlerInterface
{
    protected string $table = "room";
    public function __construct()
    {
        parent::__construct();
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
    public function findOne(int $id): Room
    {
        $data = $this->findOneAssoc($id);
        $model = new Room();
        $model->fromArray($data);
        return $model;
    }
}