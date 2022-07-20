<?php

namespace Service;

use System\Database\Connection;

class CreateDbReservation implements ReservationStrategy
{
    public function createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $dbConnection = Connection::getConnection();
        $dbConnection->query(
            "
        INSERT INTO reservations(room_id, firstname, lastname, email, start_date, end_date) VALUES(
        '$roomId',                                                                                          
        '$firstName',                                                                                          
        '$lastName',                                                                                          
        '$email',
        '$startDate',
        '$endDate'                                                                                         
        )
        "
        );
    }
}