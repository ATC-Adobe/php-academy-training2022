<?php

namespace Reservation;

require_once('../../autoloading.php');

use SystemDatabase\MysqlConnection;
use \DateTime;
use Reservation\Reservation;

class ReservationRepository
{
    #private $room_id;
    #private $firstname;
    #private $lastname;
    #private $email;
    #private $start_date;
    #private $end_date;

    public function addReservation(Reservation $objectReservation)
    {
        #$this->room_id = $_POST['reservation_id'];
        #$this->firstname = $_POST['firstname'];
        #$this->lastname = $_POST['lastname'];
        #$this->email = $_POST['email'];
        #$this->start_date = $_POST['startdate'];
        #$this->end_date = $_POST['enddate'];

        $aa = $objectReservation->getStartDate();

        $aa = new DateTime($aa);
        $aa = $aa->format('m/d/Y H:i:s');

        $bb = $objectReservation->getEndDate();

        $bb = new DateTime($bb);
        $bb = $bb->format('m/d/Y H:i:s');

        $dbConnection = MysqlConnection::getInstance();
        $insert = "INSERT INTO reservation (room_id, id_user, name, surname, email, start, end)
            VALUES (
                ".$objectReservation->getRoomId().",
                ".$objectReservation->getUserId().",
                '" . $objectReservation->getFirstname() . "',
                '" . $objectReservation->getLastname() . "',
                '" . $objectReservation->getEmail() . "',
                STR_TO_DATE('" . $aa . "','%m/%d/%Y %H:%i:%s'),
                STR_TO_DATE('" . $bb . "','%m/%d/%Y %H:%i:%s')
                );
        ";

        $dbConnection->query($insert);

    }

    public function readReservation()
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT * FROM reservation";
        $result = $dbConnection->query($query)->fetchAll();

        return $result;
    }

    #public function takeRoomId(Reservation $reservationObject)
    #{
        #$dbConnection = MysqlConnection::getInstance();
        #$query = "SELECT room_id FROM reservation WHERE id = '".$reservationObject->getReservationId()."';";
        #$result = $dbConnection->query($query);

        #return $result;
    #}

    public function deleteReservation($id)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "DELETE FROM reservation WHERE id = ".$id.";";
        $dbConnection->query($query);

        #return $result;
    }

    public function showUserReservations($userId)
    {
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT * FROM reservation WHERE id_user = ".$userId.";";
        $result = $dbConnection->query($query)->fetchAll();

        return $result;

    }
}
