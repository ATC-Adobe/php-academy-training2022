<?php

namespace App\Repository;

use App\Model\Reservation;
use App\Model\Room;
use App\System\Database\Connection;
use PDO;
use IOHandlerInterface;

class ReservationRepository implements IOHandlerInterface
{
    protected ?Connection $connection = null;

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
            INSERT INTO reservation ( room_id, first_name, last_name, email, start_date, end_date) VALUES ( :room_id, :first_name, :last_name, :email, :start_date,
     :end_date
            );"
        );
        return $statement->execute($reservation->toArray());
    }

    /**
     * @return false|Reservation[]
     */
    public function readAll(): false|array
    {
        return $this->connection->query("SELECT * FROM reservation")->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return bool|Reservation[]
     */
    public function readWithRelations(): array|bool
    {
        $data = $this->connection->query(
            "SELECT 
                reservation.id,
                room_id,
                first_name,
                last_name,
                email,
                start_date,
                end_date,
                name as room_name,
                floor as room_floor
            FROM room JOIN reservation ON room_id = room.id"
        )->fetchAll(PDO::FETCH_ASSOC);
        if ($data === false) {
            return false;
        }
        $result = [];
        foreach ($data as $row) {
            $reservation = new Reservation();
            $room = new Room();
            $reservation->fromArray($row);
            $room->fromArray($row);
            $reservation->room = $room;
            $result[] = $reservation;
        }
        return $result;
    }

    public function delete(int $id): bool
    {
        $stm = $this->connection->prepare("DELETE FROM reservation WHERE id = :id;");
        $stm->bindParam("id", $id);
        return $stm->execute();
    }
}