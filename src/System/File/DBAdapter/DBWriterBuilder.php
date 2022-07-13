<?php

namespace System\File\DBAdapter;

use System\File\IFileWriter;
use System\File\IFileWriterBuilder;

class DBWriterBuilder implements IFileWriterBuilder {
    public function buildInstance(): IFileWriter {
        return new DBWriter();
    }
}