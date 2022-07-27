<?php

namespace Api\Reservation;

use System\Database\Connection;

class ReservationApi
{
    protected Connection $dbConnection;

    public function __construct()
    {
        $this->dbConnection = Connection::getConnection();
    }

    public function getReservations(): array
    {
        $query = "SELECT * FROM reservations";
        try {
            $queryResult = $this->dbConnection->query($query)->fetchAll();
            $reservations = $this->reservationsArray($queryResult);
            return ['reservations' => $reservations];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    public function getCurrentReservations(): array
    {
        $query = "SELECT * FROM reservations WHERE start_date >=NOW()";
        try {
            $queryResult = $this->dbConnection->query($query)->fetchAll();
            $reservations = $this->reservationsArray($queryResult);
            return ['reservations' => $reservations];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    public function getReservationByUser($userId): array
    {
        $query = "SELECT * FROM reservations WHERE id_user=?";
        try {
            $queryResult = $this->dbConnection->prepare($query);
            $queryResult->execute([$userId]);
            $reservations = $this->reservationsPdoArray($queryResult);
            return ['reservations' => $reservations];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    public function addReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate): array
    {
        $query = "INSERT INTO reservations (room_id, id_user, firstname, lastname, email, start_date, end_date) VALUES (?,?,?,?,?,?,?)";

        try {
            $queryResult = $this->dbConnection->prepare($query);
            $result = $queryResult->execute([$roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate]);
            if (!$result) {
                throw new \RuntimeException("Unexpected error occurs.", 500);
            }
            if ($result) {
                $lastId = $this->dbConnection->lastInsertId();
                $query = "SELECT * FROM reservations WHERE reservation_id = '$lastId'";
                $queryResult = $this->dbConnection->query($query);
                $reservations = $this->reservationsPdoArray($queryResult);
                return ['reservations' => $reservations];
            }
            return ['message' => "Reservation created"];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    /**
     * @param bool|array $queryResult
     * @return array
     */
    public function reservationsArray(bool|array $queryResult): array
    {
        $reservations = [];
        foreach ($queryResult as $res) {
            $reservations[] =
                [
                    'reservation_id' => $res['reservation_id'],
                    '$room_id' => $res['room_id'],
                    'user_id' => $res['id_user'],
                    'firstname' => $res['firstname'],
                    'lastname' => $res['lastname'],
                    'email' => $res['email'],
                    'start_date' => $res['start_date'],
                    'end_date' => $res['end_date']
                ];
        }
        return $reservations;
    }

    /**
     * @param bool|\PDOStatement $queryResult
     * @return array
     */
    public function reservationsPdoArray(bool|\PDOStatement $queryResult): array
    {
        $reservations = [];
        foreach ($queryResult as $res) {
            $reservations[] = [
                'reservation_id' => $res['reservation_id'],
                'room_id' => $res['room_id'],
                'user_id' => $res['id_user'],
                'firstname' => $res['firstname'],
                'lastname' => $res['lastname'],
                'email' => $res['email'],
                'start_date' => $res['start_date'],
                'end_date' => $res['end_date']
            ];
        }
        return $reservations;
    }
}
//TODO: dodać kody odpowiedzi