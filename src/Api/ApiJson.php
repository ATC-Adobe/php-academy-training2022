<?php

namespace Api;

use Model\Reservation\Repository\ReservationConcreteRepository;
use Model\Room\Repository\RoomConcreteRepository;

class ApiJson {

    private RoomConcreteRepository $roomRepo;
    private ReservationConcreteRepository $reservationRepo;

    public function __construct(
        RoomConcreteRepository $roomRepo = new RoomConcreteRepository(),
        ReservationConcreteRepository $reservationRepo = new ReservationConcreteRepository(),
    ) {

        $this->reservationRepo = $reservationRepo;
        $this->roomRepo = $roomRepo;
    }

    public function getRooms() : string {
        return json_encode((new Api())->getRooms($this->roomRepo));
    }


    public function getActiveReservations() : string {
        return json_encode((new Api())->getActiveReservations($this->reservationRepo));
    }


    public function getUserReservations(int $id) : string {
        return json_encode((new Api())->getUserReservations($id, $this->reservationRepo));
    }
}