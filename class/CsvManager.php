<?php
    declare(strict_types = 1);
    namespace PHPCourse;
    use SplFileObject;

    abstract class CsvManager {
        //to edit for releasing file
        public function releaseFile(): void {
        }
    }

    class CsvReader extends CsvManager {
        private object $file;

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename);
        }

        public function getArrayFromFile(): ?array {
            if ($this->file == null) {
                return null;
            }

            $this->file->setFlags(SplFileObject::READ_CSV);

            $count = 0;
            $data = [];
            foreach ($this->file as $row) {
                if ($count++ == 0) continue;
                $data[] = $row;
            }

            //$this->releaseFile($this->file);

            return $data;
        }
    }

    class CsvWriter extends CsvManager {

        private object $file;

        public function __construct(string $filename)
        {
            $this->file = new SplFileObject($filename, 'a');
        }

        public function saveCsv(array $data): void
        {
            if ($this->file == null) {
                return;
            }

            foreach ($data as $rows) {
                $this->file->fputcsv($rows);
            }

            //$this->releaseFile($this->file);
        }
    }