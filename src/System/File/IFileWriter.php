<?php

namespace System\File;

use Reservation\Model\ReservationModel;

interface IFileWriter {
    public function loadData() : void;
    public function writeLine(ReservationModel $reservation) : bool;
    public function getEntries() : array;
    public function saveChanges() : void;
    public function closeStream() : void;
}