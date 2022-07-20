<?php
namespace src\Reservation\Service;
require 'autoloading.php';
use SplFileObject;
use src\Reservation\Service\ReservationService;
class AddToCSV extends ReservationService{
public static function saveFile($data){
    {
        $myFile = new SplFileObject('reservation.csv', "a");
        $myFile->fputcsv($data);
    }

}
}