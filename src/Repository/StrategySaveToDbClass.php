<?php declare(strict_types=1);

namespace Repository;

use Database\Connection;
use Cz\PHPUnit\MockDB\Mock;

class StrategySaveToDbClass
{
    public function checkEndDate(string $startDate, string $endDate): bool
    {
        if ($startDate > $endDate) {
            $_SESSION['error_date'] = 'Warning! Your start date is later than the end one!';
            return false;
        }
        return true;
    }

    public function checkRoom(string $startDateNew): bool
    {
        $dbConnection = Connection::getInstance();
        $querySelectEnd = "SELECT start_date, end_date FROM reservation WHERE room_id = '" . $_POST['room_id'] . "'";
        $rooms = $dbConnection->query($querySelectEnd)->fetchAll();
        foreach ($rooms as $room) {
            if ($startDateNew < $room['end_date'] && $startDateNew > $room['start_date']) {
                $_SESSION['error_room'] = 'Warning! The room is not available on this date!';
                return false;
            }
        }
        return true;
    }

    public function saveTo($id)
    {
        $dbConnection = Connection::getInstance();
        $roomId = $_POST['room_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $userId = $_SESSION['user_id'];
        $insertQuery = "
    INSERT INTO reservation (room_id, firstname, lastname, email, start_date, end_date, user_id)
    VALUES (
            '$roomId',
            '$firstname',
            '$lastname',
            '$email',
            '$startDate',
            '$endDate',
            '$userId'
            );
";
        unset($_SESSION['error_date']);
        unset($_SESSION['error_room']);
        $dbConnection->query($insertQuery);
        header('Location: http://localwsl.com/src/View/reservations.php');
    }


}