<?php

namespace System\File\Xml;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class XmlFileWriterBuilder implements IFileWriterBuilder {
    public function buildInstance(): IFileWriter {
        return new XmlFileWriter();
    }
}