<?php

namespace View;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;

class ReservationView {
    public function __construct() {
    }

    public function print(): void {

        $reservationRepository = new ReservationConcreteRepository();

        $entries = $reservationRepository->getAllReservations();

        foreach($entries as $entry) {

            if( ! $entry instanceof ReservationModel ) {
                echo "This should not happen";
                die();
            }

            $id =       $entry->getId();
            $name =     $entry->getName();
            $email =    $entry->getEmail();
            $surname =  $entry->getSurname();
            $room =     $entry->getRoom()->getName();
            $to =       $entry->getTo()  ->format("d/m/Y H:i:s");
            $from =     $entry->getFrom()->format("d/m/Y H:i:s");;

            echo "<div class='row'>
                <div class='float ltable' style = 'line-height: 1.2em;' >
                    Reservation ID: <br>
                    Room ID: <br >
                    Name: <br >
                    E - mail: <br >
                    Time span: <br >
                </div >
                <div class='float rtable' style = 'line-height: 1.2em;' >
                    $id <br>
                    $room <br>
                    $name $surname <br>
                    $email <br>
                    $from - $to <br>
                </div >
                <div class='clear' ></div >
                </div>";
        }
    }
}