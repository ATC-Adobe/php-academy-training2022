<?php

namespace System\File;

interface IFileWriterBuilder {
    public function buildInstance() : IFileWriter;
}