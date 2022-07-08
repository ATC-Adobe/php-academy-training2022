<?php

include_once "./types.php";
class CsvHandler implements FileHandlerInterface
{
    public function __construct(protected string $filename, protected array $columns)
    {
    }
    protected function readWholeFile(): array {
        $result = [];
        $file = new SplFileObject($this->filename, 'r');
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            $result[] = $row;
        }
        // check if last element is blank line
        if(count($result[array_key_last($result)]) <= 1) {
            array_pop($result);
        }
        return $result;
    }
    public function readFile(): array {
        $results = [];
        $csvResults = $this->readWholeFile();
        // map array to key value pairs
        if($this->columns !== null) {
            foreach ($csvResults as $i => $row) {
                $results[]= [];
                foreach ($row as $j => $value) {
                    $results[$i][$this->columns[$j]] = $value;
                }
            }
        }
        return Util::mapResultsToObjects($results);
    }
    public function appendToFile(array $keyValuePairs): bool {
        $keyValuePairs = $this->reorderColumns($keyValuePairs);
        $file = new SplFileObject($this->filename, 'a');
        return $file->fputcsv($keyValuePairs);
    }

    public function getRowNumCsv(): int {
        $file = new SplFileObject($this->filename, 'r');
        $file->seek(PHP_INT_MAX);
        return $file->key() + 1;
    }
    private function reorderColumns(array $reservation): array {
        $result = [];
        foreach ($this->columns as $col) {
            foreach ($reservation as $key => $value) {
                if($key == $col) {
                    $result[] = $value;
                }
            }
        }
        return $result;
    }
}