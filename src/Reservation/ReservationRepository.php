<?php

namespace Reservation;

use System\Database\MysqlConnection;

class ReservationRepository

{
    public function getAllReservations(): bool|array
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT * FROM reservations;";
        return $connection->query($selectQuery)->fetchAll();
    }

    public function getReservationsWithRooms(): bool|array
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT reservations.id, roomId, firstName, lastName, email, startDay, endDay, startHour, endHour, roomNumber as roomNumber FROM reservations JOIN rooms ON rooms.id = roomId";

        return $connection->query($selectQuery)->fetchAll();
    }

    public function getMyReservations(): bool|array
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT reservations.id as id, reservations.startDay as startDay, reservations.endDay as endDay, reservations.startHour as startHour, reservations.endHour as endHour, rooms.id as roomId, rooms.roomNumber as roomNumber, user.id as userId, user.firstName as firstName, user.lastName as lastName, user.email as email FROM reservations JOIN rooms ON rooms.id = roomId JOIN user ON user.id = userId";

        return $connection->query($selectQuery)->fetchAll();
    }

    public function checkReservatedRooms($startDay, $startHour)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT roomId FROM reservations WHERE startDay = :startDay AND :startHour BETWEEN startHour AND endHour";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':startDay', $startDay);
        $statement->bindValue(':startHour', $startHour);
        $statement->execute();
        $reservatedRooms = $statement->fetchAll();

        if (count($reservatedRooms) === 0) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function addReservation(ReservationModel $reservationModel): void
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "INSERT INTO reservations (roomId, userId, firstName, lastName, email, startDay, endDay, startHour, endHour) VALUES (:roomId, :userId, :firstName, :lastName, :email, :startDay, :endDay, :startHour, :endHour)";

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

    public function getReservationById(): void
    {
        $id = $_GET['id'] ?? null;

        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT * FROM reservations WHERE id = :id";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->fetchAll();
    }

    public function updateReservation(ReservationModel $updatedModel)
    {
        $connection = MysqlConnection::getInstance();

        $updateReservation = "UPDATE reservations SET roomId = :roomId, firstName = :firstName, lastName = :lastName, email = :email, startDay = :startDay, endDay = :endDay, startHour = :startHour, endHour = :endHour WHERE id = :id";

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

    public function deleteReservation(): void
    {
        $id = $_POST['id'] ?? null;

        $connection = MysqlConnection::getInstance();

        $deleteRoom = "DELETE FROM reservations WHERE id=:id";

        $statement = $connection->prepare($deleteRoom);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}