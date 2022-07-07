<?php

// The class ReservationReader is used to load data from the csv file
class ReservationReader
{
    private $splRead;

    public function __construct()
    {
        $this->splRead = new SplFileObject('reservations.csv', 'r');
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
                'room_id' => $row[0],
                'firstname' => $row[1],
                'lastname' => $row[2],
                'email' => $row[3],
                'startday' => $row[4],
                'endday' => $row[5],
                'starthour' => $row[6],
                'endhour' => $row[7],
            ];
        }
        return $reservations;
    }
}