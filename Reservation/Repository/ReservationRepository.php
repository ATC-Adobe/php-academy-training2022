<?php
namespace Reservation\Repository;
use Reservation\Model\ReservationModel;
use System\Database\MysqlConnection;
include 'System/Database/MysqlConnection.php';

class ReservationRepository extends ReservationModel {
//    public function __construct(){}
    public function saveReservation(){
        MySqlConnection::getInstance()
            ->query("INSERT INTO reservations 
                    (room_id, firstname, lastname, email , start_date, end_date) 
                    VALUES
                        (
                          $this->roomNumber,
                         '$this->name',
                         '$this->surname',
                         '$this->email',
                          STR_TO_DATE(\"$this->dateTimeFrom\", \"%d/%m/%y %H:%i:%s\"),
                          STR_TO_DATE(\"$this->dateTimeTo\", \"%d/%m/%y %H:%i:%s\")
                        );"
            );
    }
}