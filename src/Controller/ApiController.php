<?php

namespace Controller;

use Api\ApiJson;
use Model\Reservation\Service\ReservationAdder;
use System\File\FileWriterFactory;
use System\RabbitMQ\ReservationProducer;
use System\Router\Response;

class ApiController {

    public function getRooms() {
        $res = new Response();

        $res->setJsonContent();

        $res->end((new ApiJson())->getRooms());
    }

    public function getActiveReservations() {
        $res = new Response();

        $res->setJsonContent();

        $res->end((new ApiJson())->getActiveReservations());
    }

    public function getUserReservations(\ArrayIterator $arg) {
        $res = new Response();
        $arg->next();

        if(!$arg->valid()) {
            $res->end('Error: No user id provided');
        }

        $id = intval($arg->current());

        $res->setJsonContent();

        $res->end((new ApiJson())->getUserReservations($id));
    }

    public function addReservation() {

        $res = new Response();

        try {
            [$room_id, $from, $to] = [
                htmlentities($_POST['room_id']),
                htmlentities($_POST['from']),
                htmlentities($_POST['to'])
            ];

            $id = intval($_REQUEST['user_id']);

            $from = new \DateTime($from);
            $to = new \DateTime($to);
        }
        catch(\Exception $e) {
            $res->end('ERROR: Invalid Parameters');
        }

        $result =
           intval((new ReservationProducer())
                ->call($room_id, $id, $from, $to));

        //echo $result;

        /*
            (new ReservationAdder())->uploadData(
                (new FileWriterFactory())
                    ->getInstance('db'),
                $room_id, $id, $from, $to,
            );*/

        if($result == \System\Status::RESERVATION_OK) {
            $res->end( "Reservation added successfully" );
        }
        else {
            $res->end( "ERROR: ".\System\Status::getString($result)[1]) ;
        }
    }
}