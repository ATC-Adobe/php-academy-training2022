<?php

    namespace Reservation\Service;
    use Reservation\Model\ReservationModel;

    interface ReservationServiceInterface {
        public function saveReservation (ReservationModel $reservation) :void;
    }