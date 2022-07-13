<?php

namespace App\System\File;

use App\Repository\ReservationRepository;
use App\Repository\RoomRepository;

class IOHandlerFactory
{
    /**
     * @param string|null $path path or table name
     * @return \IOHandlerInterface
     */
    public static function create(?string $path = null ): \IOHandlerInterface {
//        $temp = explode(".", $pathToFileOrTableName);
//        $extension = end($temp);
        if(isset($_POST["json"])) {
            return new JsonHandler($path ?? "./System/File/data/reservations.json");
        }
        if(isset($_POST["xml"])) {
            return new XmlHandler($path ?? "./System/File/data/reservations.xml");
        }
        if(isset($_POST["csv"])) {
            return new CsvHandler($path ?? "./System/File/data/reservations.csv");
        }
        if(isset($_POST["sql"])) {
            if($path === "room") {
                return new RoomRepository();
            }
            return new ReservationRepository();
        }
        // ???
        return new ReservationRepository();
    }
}