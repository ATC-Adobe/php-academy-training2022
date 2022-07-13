<?php

namespace System\File;

interface FileReaderInterface {
    public function loadData () :?array;
    public function loadDataById (string $reservationId) :?array;
    public function closeFile() :void;
}