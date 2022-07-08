<?php
require_once "const/constants.php";

// The class CsvReservationsReader is used to load data from the csv file
class CsvReservationsReader
{
    private $splRead;

    public function __construct()
    {
        $this->splRead = new SplFileObject(CSV_FILE, 'r');
    }

    public function readReservations()
    {
        $this->splRead->setFlags(SplFileObject::READ_CSV);
        $reservations = [];
        foreach ($this->splRead as $row) {
            //If the value for $row does not exist (last empty line in csv file) - skip it
            if (!array_filter($row)) {
                continue;
            }
            $reservations[] = [
                'roomId' => $row[0],
                'firstName' => $row[1],
                'lastName' => $row[2],
                'email' => $row[3],
                'startDay' => $row[4],
                'endDay' => $row[5],
                'startHour' => $row[6],
                'endHour' => $row[7]
            ];
        }
        return $reservations;
    }
}