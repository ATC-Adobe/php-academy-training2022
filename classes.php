<?php

class ReservationService extends SplFileObject
{
    public function __construct($filename, $mode = 'r', $useIncludePath = false, $context = null)
    {
        parent::__construct($filename, $mode, $useIncludePath, $context);
    }

    public function addReservation()
    {
        $list = [
            [$_POST['reservation_id'], $_POST['room_id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['start_date'], $_POST['end_date']],
        ];

        $fp = fopen('reservations.csv', 'w');

        if ($fp === false) {
            die('Error opening the file');
        }

        foreach ($list as $fields) {
            fputcsv($fp, $fields, chr(9));
        }
        fclose($fp);
    }

}

