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
        STR_TO_DATE('12/07/22 10:00:00', '%d/%m/%y %H:%i:%s'),                                                                                      
        STR_TO_DATE('12/07/22 10:00:00', '%d/%m/%y %H:%i:%s')
        /*STR_TO_DATE(\"$startDate\", \"%d/%m/%y %H:%i:%s\"),                                                                                      
        STR_TO_DATE(\"$endDate\", \"%d/%m/%y %H:%i:%s\")*/                                                                                          
        )
        "
        );
    }
}