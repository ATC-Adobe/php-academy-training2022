<?php
    declare(strict_types = 1);
    namespace PHPCourse;
    use Exception;

    require_once "CsvManager.php";
    require_once "MysqlConnection.php";

    class ReservationService {
        public function __construct() {}

        public function insertData ($roomId, $firstName, $lastName, $email, $startDate, $endDate): bool {
            if ($firstName == '' || $lastName == '' || $email == '') {
                return false;
            }

            if ($startDate >= $endDate) {
                return false;
            }

            $reservationId = $this->getReservationId();

            if ($reservationId == null) {
                return false;
            }

            $file = new CsvWriter('./data/reservations.csv');
            $file->saveCsv([[$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate]]);
            $file->releaseFile();

            return true;
        }

        public function insertDataToDatabase (string $query): bool {
            $instance = MysqlConnection::getInstance();
            try {
                $instance->query($query);
                return true;
            } catch (Exception $e) {
                echo $e;
                return false;
            }
        }

        public function getReservationId (): int {
            $file = new CsvReader('./data/reservations.csv');
            $reservations = $file->readCsv();

            return sizeof($reservations);
        }
    }