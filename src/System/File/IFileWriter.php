<?php

namespace System\File;

use Model\Reservation\Model\ReservationModel;

interface IFileWriter {

    /**
     * Writes Reservation to file/DB
     *
     * @param ReservationModel $reservation
     * @return bool
     */
    public function writeLine(ReservationModel $reservation) : bool;


    /**
     * Closes stream
     *
     * @return void
     */
    public function closeStream() : void;
}