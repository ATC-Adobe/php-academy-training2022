<?php
namespace src\Reservation\Repository;
use src\Reservation\Model\ReservationModel;
include_once 'src/Reservation/Model/ReservationModel.php';
use System\Database\Connection;


class ReservationRepository extends ReservationModel {
//    public function __construct(){}
public int $id;
    public function saveReservation(){
//        Connection::getInstance()
//            ->query("INSERT INTO reservations
//                    (room_id, firstname, lastname, email , start_date, end_date)
//                    VALUES
//                        (
//                          $this->roomNumber,
//                         '$this->name',
//                         '$this->surname',
//                         '$this->email',
//                          STR_TO_DATE(\"$this->dateTimeFrom\", \"%d/%m/%y %H:%i:%s\"),
//                          STR_TO_DATE(\"$this->dateTimeTo\", \"%d/%m/%y %H:%i:%s\")
//                        );"
//            );

        Connection::getInstance()
            ->query(" INSERT INTO reservations ( room_id, user_id, start_date, end_date)
                    VALUES
                        (
                          $this->roomNumber,
                         '$this->userID',
                          STR_TO_DATE(\"$this->dateTimeFrom\", \"%d/%m/%y %H:%i:%s\"),
                          STR_TO_DATE(\"$this->dateTimeTo\", \"%d/%m/%y %H:%i:%s\")
                        );"
            );


    }
public static function getReservation(){
    return Connection::getInstance()
        ->query("SELECT reservations.reservation_id, reservations.room_id, user.username, user.surname, user.email, reservations.start_date, reservations.end_date, rooms.roomName from reservations inner join user
on user.user_id=reservations.user_id inner join rooms on reservations.room_id = rooms.roomID ORDER BY reservation_id ASC ;");
}
public static function deleteReservation($id,$user_id){
    Connection::getInstance()
        ->query("DELETE from reservations where reservation_id=$id and user_id=$user_id");
}

public static function isReserved($id){
   return Connection::getInstance()
        ->query("select * from reservations where user_id is not null and room_id=$id");
}

    public static function myReservation($id){
        return Connection::getInstance()
            ->query("SELECT reservations.reservation_id, rooms.roomName, rooms.floor, reservations.start_date, reservations.end_date from reservations inner join rooms on reservations.room_id = rooms.roomID where reservations.user_id='$id' ORDER BY reservation_id ASC ;");
    }

}