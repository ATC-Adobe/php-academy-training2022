<?php
namespace Reservation\Model;
use http\Exception\BadQueryStringException;
use Reservation\Repository\ReservationRepository;

class ReservationModel{
   // public int $reservationID;
    public int $roomNumber;
    public string $name;
    public string $surname;
    public string $email;
    public string $dateTimeFrom;
    public string $dateTimeTo;

    public function __construct( int $roomNumber, string $name, string $surname, string $email, string $dateTimeFrom, string $dateTimeTo){
//       $this->reservationID = $reservationID;
        $this->roomNumber = $roomNumber;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->dateTimeFrom = $dateTimeFrom;
        $this->dateTimeTo = $dateTimeTo;
    }

//    function get_reservationID() {
//       return $this->reservationID;
//    }

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
