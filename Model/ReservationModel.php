<?php

namespace App\Model;

use App\System\Database\Connection;
use PDO;

class ReservationModel
{
//    protected ?Connection $connection = null;
//    public string $table = "reservation";
    public int $id;
    public int $room_id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $start_date;
    public string $end_date;

//    public function save(): bool
//    {
//        $statement = $this->connection->prepare(
//            "
//            INSERT INTO reservation ( room_id, first_name, last_name, email, start_date, end_date) VALUES (
//                                                               :room_id,
//                                                               :first_name,
//                                                               :last_name,
//                                                               :email,
//                                                               :start_date,
//                                                               :end_date
//            );"
//        );
//        return $statement->execute($reservation);
//    }

}