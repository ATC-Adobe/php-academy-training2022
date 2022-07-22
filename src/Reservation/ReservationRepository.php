<?php

namespace Reservation;

use System\Database\MysqlConnection;

class ReservationRepository
{
    public function getReservationsWithRooms(): bool|array
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT res.id, res.firstName, res.lastName, res.email, res.startDay, res.endDay, res.startHour, res.endHour, rooms.roomNumber FROM reservations AS res JOIN rooms AS rooms ON rooms.id = roomId";

        return $connection->query($selectQuery)->fetchAll();
    }

    public function getMyReservations($id): bool|array
    {
        $connection = MysqlConnection::getInstance();
        $selectQuery = "SELECT res.id, res.startDay, res.endDay, res.startHour, res.endHour, rooms.id, rooms.roomNumber, us.firstName, us.lastName, us.email FROM reservations AS res JOIN rooms AS rooms ON rooms.id = res.roomId JOIN user AS us ON us.id = res.userId WHERE us.id = :id";

        $statement = $connection->prepare($selectQuery);
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function checkReservatedRooms($roomId, $startDay, $startHour, $endHour)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT DISTINCT roomId = :roomId FROM reservations WHERE startDay = :startDay AND ((:startHour BETWEEN startHour AND endHour) OR (:endHour BETWEEN startHour AND endHour))";

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

    public function getReservationById($id)
    {
        $connection = MysqlConnection::getInstance();

        $selectQuery = "SELECT res.id, res.userId, res.firstName, res.lastName, res.email, res.startDay, res.endDay, res.startHour, res.endHour, rooms.id, rooms.roomNumber FROM reservations AS res JOIN rooms AS rooms ON rooms.id = res.roomId WHERE res.id = :id";

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