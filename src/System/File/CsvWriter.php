<?php
    namespace System\File;
    use SplFileObject;

    class CsvWriter {
        protected object $file;

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename, 'a');
        }

        public function saveCsv(array $data): void {
            if ($this->file == null) {
                return;
            }

            foreach ($data as $rows) {
                $this->file->fputcsv($rows);
            }

            $this->releaseFile();
        }

        public function releaseFile(): void {
            unset($this->file);
        }
    }