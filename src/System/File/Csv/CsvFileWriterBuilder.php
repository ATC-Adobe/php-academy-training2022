<?php

namespace System\File\Csv;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class CsvFileWriterBuilder implements IFileWriterBuilder {
    public function buildInstance(): IFileWriter {
        echo "putting";
        return new CsvFileWriter("reservations/reservations.csv");
    }
}