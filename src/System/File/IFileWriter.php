<?php

namespace System\File;

use Reservation\Model\ReservationModel;

interface IFileWriter {
    public function writeLine(ReservationModel $reservation) : bool;
    public function closeStream() : void;
}