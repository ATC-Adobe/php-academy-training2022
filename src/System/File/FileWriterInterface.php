<?php

namespace System\File;
use Reservation\Model\ReservationModel;

interface FileWriterInterface {
    public function saveData(ReservationModel $reservation) :bool;
    public function changeData(string $reservationId, ReservationModel $reservation) :void;
    public function closeFile() :void;
}