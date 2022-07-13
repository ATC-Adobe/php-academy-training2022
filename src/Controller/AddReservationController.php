<?php

namespace Controller;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Room\Repository\RoomConcreteRepository;
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

            $res = $this->uploadData(
                $room_id, $name, $surname, $email, $from, $to
            );

            if( $res  ) { // success
                header('Location: roomReservationListing.php?status=1');
                die();
            }
        }

        header('Location: roomReservationListing.php?status=2');
        die();
    }

    // this function might be moved safely
    // to separate class located in /Reservation/Service
    private function uploadData(
        string $roomId, string $name,       string $surname,
        string $email,  \DateTime $from,    \DateTime $to
    ) : bool {

        $roomNId = intval($roomId);

        if($surname == '' || $name == '' || $email == '')
            return false;

        $reservationRepository = new ReservationConcreteRepository();

        $valid =
            $reservationRepository
                ->checkForTimeCollisions(
                    $roomNId,
                    $from,
                    $to
                );

        if( !$valid ) {
            return false;
        }

        $room = (new RoomConcreteRepository())
            ->getRoomById($roomNId);

        if($room === null) {
            return false;
        }

        $reservationRepository
            ->addReservation(
                new ReservationModel(
                    0,
                    $from,
                    $to,
                    $name,
                    $email,
                    $surname,
                    $room
                ),
                (new FileWriterFactory())
                    ->getInstance("json")
            );

        return true;
    }
}