<?php
namespace src\Reservation\Service;
use src\Reservation\Model\ReservationModel;
use System\Database\Connection;

class ReservationService extends ReservationModel
{
//    public function __construct()
//    {
//    }
    public static function createReservation(ReservationModel $reservation)
    {
        $roomNumber = $reservation->get_roomNumber();
        $name = $reservation->get_name();
        $surname = $reservation->get_surname();
        $email = $reservation->get_email();
        $dateTimeFrom = date('d/m/y H:i:s', strtotime($reservation->get_dateTimeFrom()));
        $dateTimeTo = date('d/m/y H:i:s', strtotime($reservation->get_dateTimeTo()));
        return  [$roomNumber,$name, $surname, $email, $dateTimeFrom, $dateTimeTo];

    }

}
