<?php

    namespace System\File;
    use System\File\Csv\CsvReader;
    use Reservation\Repository\ReservationRepository;

    class FileReader {
        public function read (string $action) :array{
            $data = match($action) {
                'db'        => (new ReservationRepository())->getAllReservations(),
                'csv'       => (new CsvReader('./src/System/Data/reservations.csv'))->loadData(),
                'xml'       => 'xml file',
                'json'      => 'json file',
                'default'   => 'Unknown type',
            };

            return $data;
        }
    }