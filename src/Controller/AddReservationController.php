<?php

namespace Controller;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Reservation\Service\ReservationAdder;
use Room\Repository\RoomConcreteRepository;
use Router\Response;
use System\File\FileWriterFactory;
use System\Util\DateFormatter;

class AddReservationController {
    public function __construct() { }

    public function makeRequest() : void {

        if(isset($_POST['room_id'])) {
            [ $room_id, $name, $surname, $email, $from, $to, ]
                = [ $_POST['room_id'],  $_POST['name'],     $_POST['surname'],
                    $_POST['email'],    $_POST['from'],     $_POST['to']];


            $from = DateFormatter::htmlDateToDateTime($from);
            $to   = DateFormatter::htmlDateToDateTime($to);
            /*
            var_dump($conv);

            $from = strtotime($from);
            $to   = date("d/m/y H:i:s", strtotime($to));
            */

            $res =
                (new ReservationAdder())->uploadData(
                    (new FileWriterFactory())
                        ->getInstance($_POST['option']),
                $room_id, $name, $surname, $email, $from, $to
            );


            if(__ROUTER) {
                (new Response())->goTo('/roomReservationListing?status=1');
            }
            else {
                if ($res) { // success
                    header('Location: roomReservationListing.php?status=1');
                    die();
                }
            }
        }
        if(__ROUTER) {
            (new Response())->goTo('/roomReservationListing?status=2');
        }
        else {
            header('Location: roomReservationListing.php?status=2');
            die();
        }
    }
}