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
    protected const RESERVATION_COLUMNS = [
        "id",
        "room_id",
        "first_name",
        "last_name",
        "email",
        "start_date",
        "end_date",
    ];
    protected const ROOM_COLUMNS = [
        "id",
        "name",
        "floor"
    ];

    /**
     * @param string|null $path For csv working with rooms, you path needs to contain "room" keyword
     * @return \IOHandlerInterface
     */
    public static function create(?string $path = null ): \IOHandlerInterface {
//        $temp = explode(".", $pathToFileOrTableName);
//        $extension = end($temp);

        //for post requests
        if(isset($_POST["json"])) {
            return new JsonHandler($path ?? "./System/File/data/reservations.json");
        }
        if(isset($_POST["xml"])) {
            return new XmlHandler($path ?? "./System/File/data/reservations.xml");
        }
        if(isset($_POST["csv"])) {
            if($path && str_contains($path, "room")) {
                return new CsvHandler($path, self::ROOM_COLUMNS);
            }
            else {
                return new CsvHandler($path ?? "./System/File/data/reservations.csv", self::RESERVATION_COLUMNS);
            }
        }
        if(isset($_POST["sql"])) {
            if($path === "room") {
                return new RoomRepository();
            }
            return new ReservationRepository();
        }
//        //get requests
//        if(!$path) {
//            echo "Undefined Strategy!";
//            return new ReservationRepository();
//        }
//        if(str_contains($path, "csv")) {
//
//        }
        // ???
        return new ReservationRepository();
    }
}