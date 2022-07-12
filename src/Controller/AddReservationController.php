<?php

namespace Controller;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Room\Repository\RoomConcreteRepository;

class AddReservationController {
    public function __construct() { }

    public function makeRequest() : void {

        if(isset($_POST['room_id'])) {
            [ $room_id, $name, $surname, $email, $from, $to, ]
                = [ $_POST['room_id'],  $_POST['name'],     $_POST['surname'],
                    $_POST['email'],    $_POST['from'],     $_POST['to']];


            $from = date("d/m/y H:i:s", strtotime($from));
            $to   = date("d/m/y H:i:s", strtotime($to));

            $res = $this->uploadData(
                $room_id, $name, $surname, $email, $from, $to
            );

            echo "WE THERE";

            if( $res  ) { // success
                header('Location: roomReservationListing.php?status=1');
                die();
            }
        }

        echo "WE THERE";

        header('Location: roomReservationListing.php?status=2');
        die();
    }

    private function uploadData(
        string $roomId, string $name, string $surname,
        string $email,  string $from, string $to
    ) : bool {

        $roomNId = intval($roomId);

        if($surname == '' || $name == '' || $email == '')
            return false;

        $reservationRepository = new ReservationConcreteRepository();

        $from = \DateTime::createFromFormat("Y-m-d H:i:s", $from);
        $to   = \DateTime::createFromFormat("Y-m-d H:i:s", $to);

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
                )
            );

        return true;
    }
}