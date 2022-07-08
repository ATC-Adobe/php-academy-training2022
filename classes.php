<?php

class ReservationService
{
    public function __construct()
    {

    }

    public function generateId()
    {
        $rows = count(file("reservations.csv"));
        $id = $rows + 1; // well named or less code?
        return $id;
    }

    public function readReservations()
    {
        $reservations = [];
        $file = new SplFileObject("reservations.csv");
        while (!$file->eof()) {
            $row = $file->fgetcsv();
            $reservations[] = $row;
        }
        return $reservations;
    }

    public function addReservation($id, $reservations)
    {

        $list = array(
            [$id, $_POST['room_id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['start_date'], $_POST['end_date']],
        );
        $reservations = array_merge($reservations, $list);
        $updatedFile = new SplFileObject("reservations.csv", 'w');
        foreach ($reservations as $fields) {
            $updatedFile->fputcsv($fields);
        }
    }
}

