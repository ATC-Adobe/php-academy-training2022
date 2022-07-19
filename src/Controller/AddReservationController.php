<?php

namespace Controller;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Reservation\Service\ReservationAdder;
use Room\Repository\RoomConcreteRepository;
use Router\Response;
use System\File\FileWriterFactory;
use System\Status;
use System\Util\Authenticator;
use System\Util\DateFormatter;
use System\Util\Session;

class AddReservationController {
    public function __construct() { }

    /**
     * Function validates reservation requests and redirects to proper view
     *
     * @return void
     */
    public function makeRequest() : void {

        if(!isset($_POST['room_id'])) {
            (new Response())
                ->goTo('/');
        }


        [ $room_id, $from, $to, ]
            = [ $_POST['room_id'],    $_POST['from'],     $_POST['to']];


        $auth = new Authenticator();

        if(!$auth->isLogged()) {
            (new Response())
                ->goTo('/');
        }

        $from   = new \DateTime($from);
        $to     = new \DateTime($to);

        if($to <= $from) {
            (new Response())
                ->goTo('/room/add?id='
                    .$_POST['room_id']
                    .'&status='
                    .Status::RESERVATION_DATE_INVERSION);
        }

        $res =
            (new ReservationAdder())->uploadData(
                (new FileWriterFactory())
                    ->getInstance($_POST['option']),
            $room_id, $auth->getUser()->getId(), $from, $to,
        );


        if($res) {
            (new Response())
                ->goTo('/reservation/list?status='
                    . Status::RESERVATION_OK);
        }
        else {
            (new Response())
                ->goTo('/reservation/list?id='
                    .$_POST['room_id']
                    .'&status='
                    . Status::RESERVATION_COLLISION);
        }
    }
}