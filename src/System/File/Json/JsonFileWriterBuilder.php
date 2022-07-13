<?php

namespace System\File\Json;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class JsonFileWriterBuilder implements IFileWriterBuilder {

    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function buildInstance(): IFileWriter {
        return new JsonFileWriter($this->filename);
    }
}