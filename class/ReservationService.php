<?php
    declare(strict_types = 1);
    namespace PHPCourse;
    require_once "CsvManager.php";

    class ReservationService {
        public function __construct() {}

        public function validData (): int {
            $file = new CsvReader('./data/reservations.csv');
            $reservations = $file->getArrayFromFile();

            return sizeof($reservations);
        }

        public function insertData ($roomId, $firstName, $lastName, $email, $startDate, $endDate): bool {
            if ($firstName == '' || $lastName == '' || $email == '') {
                return false;
            }

            if ($startDate >= $endDate) {
                return false;
            }

            $reservationId = $this->validData();

            if ($reservationId == null) {
                return false;
            }

            $file = new CsvWriter('./data/reservations.csv');
            $file->saveCsv([[$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate]]);
            //$file->releaseFile();

            return true;
        }
    }

