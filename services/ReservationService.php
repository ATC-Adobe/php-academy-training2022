<?php

use System\Database\Connection;

include_once 'services/ApplicationService.php';
include_once 'db/Connection.php';

class ReservationService
{
    private $reservation;

    public function __construct()
    {
        $this->reservation = new SplFileObject((new ApplicationService())->getCsvReservationUrl(), 'a');
    }

    public function addReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
    {
        $rows = (new ApplicationService())->getRows();
        $reservationId = $rows;
        $this->reservation->fputcsv([$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate]);
        (new ApplicationService())->getReservationListHeader();
    }

    public function addDbReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate)
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
        (new ApplicationService())->getReservationListHeader();
    }

    public function getReservations(Connection $dbConnection): array|false
    {
        $reservations = $dbConnection->query(
            "SELECT * FROM reservations ORDER BY reservation_id ASC"
        )->fetchAll();
        return $reservations;
    }
}