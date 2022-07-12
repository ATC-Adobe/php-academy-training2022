<?php

namespace App\Repository;

use App\Model\ReservationModel;
use App\System\Database\Connection;
use PDO;

class ReservationRepository
{
    protected ?Connection $connection = null;
    protected $table = "reservation";
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }
    public function save(ReservationModel $reservation): bool
    {
        $statement = $this->connection->prepare(
            "
            INSERT INTO $this->table ( room_id, first_name, last_name, email, start_date, end_date) VALUES (
                                                               :room_id,
                                                               :first_name,
                                                               :last_name,
                                                               :email,
                                                               :start_date,
                                                               :end_date
            );"
        );
        return $statement->execute((array) $reservation);
    }
    public function readAll(): bool|array
    {
        return $this->connection->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_OBJ);

    }
}