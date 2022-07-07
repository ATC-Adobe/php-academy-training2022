<?php

class ReservationService
{
    public static function booking()
    {
        $room_id = '';
        $firstname = '';
        $lastname = '';
        $email = '';
        $start_date = '';
        $end_date = '';
        $file = fopen("data/reservations.csv", "a");
        $rows = count(file("data/reservations.csv"));
        if ($rows > 1) {
            $rows = ($rows - 1) + 1;
        }
        $form_data = array(
            'reservation_id' => $rows,
            'room_id' => $room_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'start_date' => $start_date,
            'end_date' => $end_date,
        );
        fputcsv($file, $form_data);
        header('location:reservations.php?msg=add');
    }

}