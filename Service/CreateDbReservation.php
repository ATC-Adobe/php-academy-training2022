<?php

namespace Service;

use System\Database\Connection;

class CreateDbReservation implements ReservationStrategy
{
    public function createReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $dbConnection = Connection::getConnection();
        $dbConnection->query(
            "
        INSERT INTO reservations(room_id, id_user, firstname, lastname, email, start_date, end_date) VALUES(
        '$roomId',
        '$userId',
        '$firstName',                                                                                          
        '$lastName',                                                                                          
        '$email',
        '$startDate',
        '$endDate'                                                                                         
        )
        "
        );
        $sessionMsg = new Session();
        $sessionMsg->sessionMessage('reservationCreated');
    }
}