<?php
    namespace System\File;
    use SplFileObject;

    class CsvReader {
        protected object $file;

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename);
        }

        public function readCsv(): ?array {
            if ($this->file == null) {
                return null;
            }

            $this->file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);

            $count = 0;
            $data = [];
            foreach ($this->file as $row) {
                if ($count++ == 0) continue;
                $data[] = $row;
            }

            $this->releaseFile();

            return $data;
        }

        public function releaseFile(): void {
            unset($this->file);
        }
    }