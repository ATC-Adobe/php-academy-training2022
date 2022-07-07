<?php
    declare(strict_types = 1);
    namespace PHPCourse;
    use SplFileObject;

    abstract class CsvManager {
        protected object $file;

        public function releaseFile(): void {
            unset($this->file);
        }
    }

    class CsvReader extends CsvManager {

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename);
        }

        public function getArrayFromFile(): ?array {
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
    }

    class CsvWriter extends CsvManager {

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

            $this->releaseFile();
        }
    }