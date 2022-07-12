<?php

namespace App\Repository;

use App\Model\Reservation;
use App\System\Database\Connection;
use PDO;
use RepositoryInterface;

class ReservationRepository implements RepositoryInterface
{
    protected ?Connection $connection = null;
    protected string $table = "reservation";
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    /**
     * @param Reservation $reservation
     * @return bool
     */
    public function save($reservation): bool
    {
        $statement = $this->connection->prepare(
            "
            INSERT INTO $this->table ( room_id, first_name, last_name, email, start_date, end_date) VALUES ( :room_id, :first_name, :last_name, :email, :start_date,
     :end_date
            );"
        );
        return $statement->execute((array) $reservation);
    }

    /**
     * @return bool|Reservation[]
     */
    public function readAll(): bool|array
    {
        return $this->connection->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_OBJ);

    }
}