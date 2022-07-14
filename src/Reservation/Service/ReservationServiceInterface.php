<?php

    namespace Reservation\Service;
    use Reservation\Model\ReservationModel;

    interface ReservationServiceInterface {
        public function save () :void;
        public function delete () :void;
    }