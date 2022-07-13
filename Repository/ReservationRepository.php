<?php

namespace Repository;

use System\Database\Connection;

class ReservationRepository
{
    public function getAllReservations(Connection $dbConnection)
    {
        $reservations = $dbConnection->query("SELECT * FROM reservations ORDER BY reservation_id ASC")->fetchAll();
        return $reservations;
    }

    public function storeReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $dbConnection = Connection::getConnection();
        $addQuery = $dbConnection->query(
            "
        INSERT INTO reservations(room_id, firstname, lastname, email, start_date, end_date) VALUES(
        '$roomId',                                                                                          
        '$firstName',                                                                                          
        '$lastName',                                                                                          
        '$email',                                                                                          
        STR_TO_DATE('12/07/22 10:00:00', '%d/%m/%y %H:%i:%s'),                                                                                      
        STR_TO_DATE('12/07/22 10:00:00', '%d/%m/%y %H:%i:%s')
        /*STR_TO_DATE('$startDate', '%d/%m/%y %H:%i:%s'),                                                                                      
        STR_TO_DATE('$endDate', '%d/%m/%y %H:%i:%s') */                                                                                         
        )
        "
        );
      //  (new ApplicationService())->getReservationListHeader();
    }

    public function destroyReservation(Connection $dbConnection):void
    {
        $reservationId = $_GET['reservation_id'];
        $dbConnection->query(
            "DELETE FROM reservations WHERE reservation_id='$reservationId'"
        );
    }

}