<?php
    namespace System\File\Csv;

    use SplFileObject;
    use System\File\FileReaderInterface;

    class CsvReader implements FileReaderInterface {
        private object $file;

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename);
        }

        public function loadData() :?array {
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

            return $data;
        }

        // TODO: Implement loadDataById() method.
        public function loadDataById(string $reservationId): ?array{
            return [];
        }

        public function closeFile(): void {
            unset($this->file);
        }
    }