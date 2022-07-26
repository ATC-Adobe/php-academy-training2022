<?php
require_once 'autoloading.php';

use Database\Connection;

class RoomApi
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    public function getAllRooms(): array
    {
        $selectQuery = "SELECT * FROM room";
        try {
            $selectResults = $this->connection->query($selectQuery)->fetchAll();
            $rooms = [];
            foreach ($selectResults as $result) {
                $rooms[] = ['room_id' => $result['room_id'], 'name' => $result['name'], 'floor' => $result['floor']];
            }
            return ['rooms' => $rooms];
        } catch (Exception $exception) {
            return ['message' => $exception->getMessage()];
        }

    }

    public function getAllReservations(): array
    {
        $selectQuery = "SELECT * FROM reservation";
        try {
            $selectResults = $this->connection->query($selectQuery)->fetchAll();
            $reservations = [];
            foreach ($selectResults as $result) {
                $reservations[] = [
                    'reservation_id' => $result['reservation_id'],
                    'room_id' => $result['room_id'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['email'],
                    'start_date' => $result['start_date'],
                    'end_date' => $result['end_date'],
                    'user_id' => $result['user_id'],
                ];
            }
            return ['reservations' => $reservations];
        } catch (Exception $exception) {
            return ['message' => $exception->getMessage()];
        }

    }

    public function getActualReservations(): array
    {
        $selectQuery = "SELECT * FROM reservation";
        try {
            $selectResults = $this->connection->query($selectQuery)->fetchAll();
            $reservations = [];
            $currentDate = new DateTime();
            $currentDate = $currentDate->format('Y-m-d H:i:s');
            foreach ($selectResults as $result) {
                if ($result['start_date'] > $currentDate) {
                    $reservations[] = [
                        'reservation_id' => $result['reservation_id'],
                        'room_id' => $result['room_id'],
                        'firstname' => $result['firstname'],
                        'lastname' => $result['lastname'],
                        'email' => $result['email'],
                        'start_date' => $result['start_date'],
                        'end_date' => $result['end_date'],
                        'user_id' => $result['user_id'],
                    ];
                }
            }
            return ['reservations' => $reservations];
        } catch (Exception $exception) {
            return ['message' => $exception->getMessage()];
        }
    }

    public function getUserReservations($userId): array
    {
        $selectQuery = "SELECT * FROM reservation WHERE user_id = '$userId'";
        try {
            $selectResults = $this->connection->query($selectQuery)->fetchAll();
            $reservations = [];
            foreach ($selectResults as $result) {
                $reservations[] = [
                    'reservation_id' => $result['reservation_id'],
                    'room_id' => $result['room_id'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['email'],
                    'start_date' => $result['start_date'],
                    'end_date' => $result['end_date'],
                    'user_id' => $result['user_id'],
                ];
            }
            return ['reservations' => $reservations];
        } catch (Exception $exception) {
            return ['message' => $exception->getMessage()];
        }
    }

    public function createReservation(int $roomId, string $firstname, string $lastname, string $email, string $startDate, string $endDate, int $userId): array
    {
        $insertQuery = "INSERT INTO reservation (room_id, firstname, lastname, email, start_date, end_date, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        try {
            $statement = $this->connection->prepare($insertQuery);
            $result = $statement->execute([$roomId, $firstname, $lastname, $email, $startDate, $endDate, $userId]);

            if (!$result){
                throw new Exception('Your reservation did not proceed!');
            }

            return ['message' => 'Your room was reserved'];

        }catch (Exception $e){
            return ['message' => $e->getMessage()];
        }
    }

}