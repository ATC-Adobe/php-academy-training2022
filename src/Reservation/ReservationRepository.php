<?php

namespace Reservation;

date_default_timezone_set('Europe/Warsaw');

use System\Database\MysqlConnection;

class ReservationRepository
{

    public function getAllReservations()
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT * FROM reservations";

        return $connection->query($selectQuery)->fetchAll();
    }

    public function getCurrentlyAvailableReservations()
    {
        $todayDate = date("Y-m-d");
        $currentHour = date("H:i");

        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT * FROM reservations WHERE startDay > :todayDate OR ((startDay = :todayDate) AND (startHour >= :currentHour))";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':todayDate', $todayDate);
        $statement->bindValue(':currentHour', $currentHour);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getReservationsWithRooms()
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT res . id, res . firstName, res . lastName, res . email, res . startDay, res . endDay, res . startHour, res . endHour, rooms . roomNumber FROM reservations as res JOIN rooms as rooms ON rooms . id = roomId";

        return $connection->query($selectQuery)->fetchAll();
    }

    public function getMyReservations($id)
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT res . id, res . startDay, res . endDay, res . startHour, res . endHour, rooms . id, rooms . roomNumber, us . id, us . firstName, us . lastName, us . email FROM reservations as res JOIN rooms as rooms ON rooms . id = res . roomId JOIN user as us ON us . id = res . userId WHERE us . id = :id";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':id', $id);
        $statement->execute();
//        var_dump($statement->fetchAll());die;
        return $statement->fetchAll();
    }

    public function getTheNewestReservation($userId)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT res . id, res . startDay, res . endDay, res . startHour, res . endHour, rooms . id, rooms . roomNumber, us . id FROM reservations as res JOIN rooms as rooms ON rooms . id = res . roomId JOIN user as us ON us . id = res . userId WHERE us . id = :id ORDER BY endDay DESC LIMIT 1";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':id', $userId);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function checkReservatedRooms($roomId, $startDay, $startHour, $endHour)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT DISTINCT roomId = :roomId FROM reservations WHERE startDay = :startDay and ((:startHour BETWEEN startHour and endHour) or (:endHour BETWEEN startHour and endHour))";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':roomId', $roomId);
        $statement->bindValue(':startDay', $startDay);
        $statement->bindValue(':startHour', $startHour);
        $statement->bindValue(':endHour', $endHour);
        $statement->execute();
        $reservatedRooms = $statement->fetchAll();

        if (count($reservatedRooms) === 0) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function addReservation(ReservationModel $reservationModel)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "INSERT INTO reservations(
        roomId,
        userId,
        firstName,
        lastName,
        email,
        startDay,
        endDay,
        startHour,
        endHour
    ) VALUES(:roomId, :userId, :firstName, :lastName, :email, :startDay, :endDay, :startHour, :endHour)";

        $statement = $connection->prepare($selectQuery);

        $statement->bindValue(':roomId', $reservationModel->getRoomId());
        $statement->bindValue(':userId', $reservationModel->getUserId());
        $statement->bindValue(':firstName', $reservationModel->getFirstName());
        $statement->bindValue(':lastName', $reservationModel->getLastName());
        $statement->bindValue(':email', $reservationModel->getEmail());
        $statement->bindValue(':startDay', $reservationModel->getStartDay());
        $statement->bindValue(':endDay', $reservationModel->getEndDay());
        $statement->bindValue(':startHour', $reservationModel->getStartHour());
        $statement->bindValue(':endHour', $reservationModel->getEndHour());
        $statement->execute();
    }

    public function getReservationById($id)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT res . id, res . userId, res . firstName, res . lastName, res . email, res . startDay, res . endDay, res . startHour, res . endHour, rooms . id, rooms . roomNumber FROM reservations as res JOIN rooms as rooms ON rooms . id = res . roomId WHERE res . id = :id";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function updateReservation(ReservationModel $updatedModel)
    {
        $connection = MysqlConnection::getInstance();

        $updateReservation = "UPDATE reservations SET id = :reservationId, userId = :userId, roomId = :roomId, firstName = :firstName, lastName = :lastName, email = :email, startDay = :startDay, endDay = :endDay, startHour = :startHour, endHour = :endHour WHERE id = :reservationId";

        $statement = $connection->prepare($updateReservation);

        $statement->bindValue(':reservationId', $updatedModel->getReservationId());
        $statement->bindValue(':userId', $updatedModel->getUserId());
        $statement->bindValue(':roomId', $updatedModel->getRoomId());
        $statement->bindValue(':firstName', $updatedModel->getFirstName());
        $statement->bindValue(':lastName', $updatedModel->getLastName());
        $statement->bindValue(':email', $updatedModel->getEmail());
        $statement->bindValue(':startDay', $updatedModel->getStartDay());
        $statement->bindValue(':endDay', $updatedModel->getEndDay());
        $statement->bindValue(':startHour', $updatedModel->getStartHour());
        $statement->bindValue(':endHour', $updatedModel->getEndHour());
//        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function deleteReservation()
    {
        $id = $_POST['id'] ?? null;

        $connection = MysqlConnection::getInstance();

        $deleteRoom = "DELETE FROM reservations WHERE id =:id";

        $statement = $connection->prepare($deleteRoom);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}