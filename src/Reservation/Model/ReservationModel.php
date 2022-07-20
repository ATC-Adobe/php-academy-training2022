<?php
namespace src\Reservation\Model;
use http\Exception\BadQueryStringException;
use src\Reservation\Repository\ReservationRepository;

class ReservationModel{
   // public int $reservationID;
    public int $roomNumber;
    public string $name;
    public string $surname;
    public string $email;
    public string $dateTimeFrom;
    public string $dateTimeTo;
    public int $userID;

    public function __construct( int $roomNumber, int $userID, string $dateTimeFrom, string $dateTimeTo ){
//       $this->reservationID = $reservationID;
        $this->roomNumber = $roomNumber;
        $this->dateTimeFrom = $dateTimeFrom;
        $this->dateTimeTo = $dateTimeTo;
        $this->userID = $userID;
    }

//    function get_reservationID() {
//       return $this->reservationID;
//    }
    function set_userID($userID) {
        $this->userID = $userID;
    }
    function get_userID() {
        return $this->userID;
    }

    function set_roomNumber($roomNumber) {
        $this->roomNumber = $roomNumber;
    }
    function get_roomNumber() {
        return $this->roomNumber;
    }

    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }

    function set_surname($surname) {
        $this->surname = $surname;
    }
    function get_surname() {
        return $this->surname;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function get_email() {
        return $this->email;
    }

    function set_dateTimeFrom($dateTimeFrom) {
        $this->dateTimeFrom = $dateTimeFrom;
    }
    function get_dateTimeFrom() {
        return $this->dateTimeFrom;
    }

    function set_dateTimeTo($dateTimeTo) {
        $this->dateTimeTo = $dateTimeTo;
    }
    function get_dateTimeTo() {
        return $this->dateTimeTo;
    }


}
