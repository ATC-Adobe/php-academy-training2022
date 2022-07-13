<?php

namespace Reservation;

use System\Database\MysqlConnection;

class ReservationRepository
{

    public function getAllReservations()
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT * FROM reservations;";
        return $connection->query($selectQuery)->fetchAll();
    }

    public function addReservation(ReservationModel $reservationModel)
    {
        $connection = MysqlConnection::getInstance();

        $createReservation = "INSERT INTO reservations (roomId, firstName, lastName, email, startDay, endDay, startHour, endHour) VALUES (:roomId, :firstName, :lastName, :email, :startDay, :endDay, :startHour, :endHour)";

        $statement = $connection->prepare($createReservation);

        $statement->bindValue(':roomId', $reservationModel->getRoomId());
        $statement->bindValue(':firstName', $reservationModel->getFirstName());
        $statement->bindValue(':lastName', $reservationModel->getLastName());
        $statement->bindValue(':email', $reservationModel->getEmail());
        $statement->bindValue(':startDay', $reservationModel->getStartDay());
        $statement->bindValue(':endDay', $reservationModel->getEndDay());
        $statement->bindValue(':startHour', $reservationModel->getStartHour());
        $statement->bindValue(':endHour', $reservationModel->getEndHour());
        $statement->execute();
    }

    public function editReservation()
    {
        $id = $_GET['id'] ?? null;

        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT * FROM reservations WHERE id = :id";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':id', $id);
        $statement->execute();
        var_dump($statement->fetchAll());
    }

    public function updateReservation(ReservationModel $updatedModel)
    {
        $connection = MysqlConnection::getInstance();

        $updateReservation = "UPDATE reservations SET roomId = :roomId, firstName = :firstName, lastName = :lastName, email = :email, startDay = :startDay, endDay = :endDay, startHour = :startHour, endHour = :endHour) WHERE id = :id";

        $statement = $connection->prepare($updateReservation);

        $id = $_GET['id'] ?? null;
        $statement->bindValue(':roomId', $updatedModel->getRoomId());
        $statement->bindValue(':firstName', $updatedModel->getFirstName());
        $statement->bindValue(':lastName', $updatedModel->getLastName());
        $statement->bindValue(':email', $updatedModel->getEmail());
        $statement->bindValue(':startDay', $updatedModel->getStartDay());
        $statement->bindValue(':endDay', $updatedModel->getEndDay());
        $statement->bindValue(':startHour', $updatedModel->getStartHour());
        $statement->bindValue(':endHour', $updatedModel->getEndHour());
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function deleteReservation()
    {
        $id = $_POST['id'] ?? null;

        $connection = MysqlConnection::getInstance();

        $deleteRoom = "DELETE FROM reservations WHERE id=:id";

        $statement = $connection->prepare($deleteRoom);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}