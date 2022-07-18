<?php

namespace System\File;

interface IFileWriterBuilder {

    /**
     * Builds associated instance of IFileWriter
     *
     * @return IFileWriter
     */
    public function buildInstance() : IFileWriter;
}