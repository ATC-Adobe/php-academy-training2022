<?php

namespace System\File\Xml;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class XmlFileWriterBuilder implements IFileWriterBuilder {

    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function buildInstance(): IFileWriter {
        return new XmlFileWriter($this->filename);
    }
}