<?php

    namespace System\File;
    use Reservation\Service\ReservationService;
    use System\File\Csv\CsvWriter;

    class FileWriter {
        public function save (string $action) :void{
            match($action) {
                'db'        => (new ReservationService())->save(),
                'csv'       => (new CsvWriter('./src/System/Data/reservations.csv'))->saveData(),
                'xml'       => 'xml file',
                'json'      => 'json file',
                'default'   => 'Unknown type',
            };
        }
    }