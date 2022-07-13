<?php

namespace System\File\Json;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class JsonFileWriterBuilder implements IFileWriterBuilder {
    public function buildInstance(): IFileWriter {
        return new JsonFileWriter();
    }
}