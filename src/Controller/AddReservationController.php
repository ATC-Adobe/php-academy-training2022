<?php

namespace Controller;

use Model\Reservation\Service\ReservationAdder;
use System\File\FileWriterFactory;
use System\Router\Response;
use System\Status;
use System\Util\Authenticator;

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
            = [ htmlentities($_POST['room_id']),
                htmlentities($_POST['from']),
                htmlentities($_POST['to'])
            ];

        $auth = new Authenticator();

        /* not needed anymore


        if(!$auth->isLogged()) {
            (new Response())
                ->goTo('/');
        }*/

        $from   = new \DateTime($from);
        $to     = new \DateTime($to);

        $res =
            (new ReservationAdder())->uploadData(
                (new FileWriterFactory())
                    ->getInstance($_POST['option']),
            $room_id, $auth->getUser()->getId(), $from, $to,
        );


        if($res == Status::RESERVATION_OK) {
            (new Response())
                ->goTo('/reservation/list?status='
                    . Status::RESERVATION_OK);
        }
        else {
            (new Response())
                ->goTo('/reservation/add?id='
                    .$_POST['room_id']
                    .'&status='
                    . $res);
        }
    }
}