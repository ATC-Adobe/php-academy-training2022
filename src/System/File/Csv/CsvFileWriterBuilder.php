<?php

namespace System\File\Csv;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class CsvFileWriterBuilder implements IFileWriterBuilder {
    public function buildInstance(): IFileWriter {
        return new CsvFileWriter("reservations/reservations.csv");
    }
}