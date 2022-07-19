<?php

namespace App\Repository;

use App\Model\Reservation;
use App\Model\Room;
use App\Model\User;
use App\System\Database\Connection;
use PDO;
use IOHandlerInterface;

class ReservationRepository extends BaseRepository implements IOHandlerInterface
{
    protected string $table = "reservation";
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Reservation $reservation
     * @return bool
     */
    public function save($reservation): bool
    {
        $statement = $this->connection->prepare(
            "
            INSERT INTO reservation ( room_id, user_id, start_date, end_date) VALUES ( :room_id, :user_id, :start_date,
     :end_date
            );"
        );
        return $statement->execute($reservation->toArray());
    }

    /**
     * @return bool|Reservation[]
     */
    public function readWithRelations(string $whereClause = ""): array|bool
    {
        $data = $this->connection->query(
            "SELECT 
                reservation.id,
                room_id,
                user_id,
                u.first_name as user_first_name,
                u.last_name as user_last_name,
                u.email as user_email,
                start_date,
                end_date,
                name as room_name,
                floor as room_floor
                FROM room 
                JOIN reservation ON room_id = room.id
                JOIN user u on u.id = reservation.user_id
                $whereClause"
        )->fetchAll(PDO::FETCH_ASSOC);
        if ($data === false) {
            return false;
        }
        $result = [];
        foreach ($data as $row) {
            $reservation = new Reservation();
            $room = new Room();
            $user = new User();
            $reservation->fromArray($row);
            $room->fromArrayPrefix($row);
            $user->fromArrayPrefix($row);
            $reservation->room = $room;
            $reservation->user = $user;
            $result[] = $reservation;
        }
        return $result;
    }


    public function findOne(int $id): Reservation
    {
        $data = $this->findOneAssoc($id);
        $model = new Reservation();
        $model->fromArray($data);
        return $model;
    }
    public function updateOne(Reservation $reservation): bool
    {
        $stm = $this->connection->prepare("UPDATE reservation 
            SET room_id = :room_id, user_id = :user_id, start_date = :start_date, end_date = :end_date
            WHERE id = :id
                ");
        return $stm->execute($reservation->toArray());

    }

    public function findBelongsToUser(int $user_id) {
        return $this->readWithRelations("WHERE user_id = $user_id");
    }
}