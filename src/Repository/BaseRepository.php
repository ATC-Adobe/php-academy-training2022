<?php

namespace App\Repository;

use App\System\Database\Connection;
use PDO;

abstract class BaseRepository
{
    protected string $table;
    protected ?Connection $connection = null;
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    public function delete(int $id): bool
    {
        $stm = $this->connection->prepare("DELETE FROM $this->table WHERE id = :id;");
        $stm->bindParam("id", $id);
        return $stm->execute();
    }

    /**
     * @return false|array rows mapped to objects( Not actual models!)
     */
    public function readAll(): false|array
    {
        return $this->connection->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @return false|mixed associative array
     */
    protected function findOneAssoc(int $id): mixed
    {
        $stm = $this->connection->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stm->bindParam("id", $id);
        $stm->execute();
        if(!$stm->rowCount()) {
            return false;
        }
        return $stm->fetchAll(PDO::FETCH_ASSOC)[0];
    }
}