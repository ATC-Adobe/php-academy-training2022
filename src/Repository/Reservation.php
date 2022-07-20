<?php

namespace Repository;

use Database\Connection;

require_once '../../autoloading.php';

class Reservation
{

    public function addReservation()
    {
        $dbConnection = Connection::getInstance();

        if (count($_POST) > 0) {
            $roomId = $_POST['room_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $insertQuery = "
    INSERT INTO reservation (room_id, firstname, lastname, email, start_date, end_date)
    VALUES (
            '$roomId',
            '$firstname',
            '$lastname',
            '$email',
            '$startDate',
            '$endDate'
            );
";

            $dbConnection->query($insertQuery);
        }

        header('Location: http://localwsl.com/src/View/reservations.php');
    }

    public function deleteReservation($id)
    {

        $dbConnection = Connection::getInstance();
        $deleteQuery = "
DELETE FROM reservation 
       WHERE reservation_id = '$id';
";
        $dbConnection->query($deleteQuery);

    }

    public function getAllReservations()
    {
        $dbConnection = Connection::getInstance();
        $selectQuery = "
    SELECT *
    FROM reservation;
";
        $selectResults = $dbConnection->query($selectQuery)->fetchAll();
        return $selectResults;
    }

}