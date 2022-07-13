<?php

namespace System\File\Csv;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class CsvFileWriterBuilder implements IFileWriterBuilder {

    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function buildInstance(): IFileWriter {
        return new CsvFileWriter($this->filename);
    }
}