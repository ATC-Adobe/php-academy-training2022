<?php
    declare(strict_types = 1);
    namespace PHPCourse;

    class FileManager {
        protected string $extension;

        public function __construct (protected string $filename) {
            $tmp = explode(".", $this->filename);
            $this->extension = end($tmp);

            if(file_exists($this->filename)) {
                return match ($this->extension) {
                    //string only for test
                    //TODO: change to handler reference
                    "csv" => "CSV FILE.",
                    "xml" => "XML FILE.",
                    "json" => "JSON FILE.",
                    default => "[Error] Unsupported file type.",
                };
            } else {
                //file doesn't exist
                return null;
            }
        }
    }