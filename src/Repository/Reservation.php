<?php

namespace Repository;

use Database\Connection;

class Reservation
{
    public function addReservation()
    {
        require_once '../../autoloading.php';
        $dbConnection = Connection::getInstance();

        if (count($_POST) > 0) {
            $roomId = $_POST['room_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $insertQuery = "
    INSERT INTO reservations (room_id, firstname, lastname, email, start_date, end_date)
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
    }

}