<?php

include_once "./types.php";
class CsvHandler implements FileHandlerInterface
{
    public function __construct(protected string $filename, protected array $columns)
    {
    }

    protected function readWholeFile() {
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
        //map to array of objects
        $results = Util::mapResultsToObjects($results);
//        echo '<pre>';
//        var_dump($results);
//        echo '</pre>';
        return $results;
    }
    public function appendToFile(array $values): bool {
        $file = new SplFileObject($this->filename, 'a');
        $ok = $file->fputcsv($values);
        return $ok;
    }

    public function getRowNumCsv() {
        $file = new SplFileObject($this->filename, 'r');
        $file->seek(PHP_INT_MAX);
        return $file->key() + 1;
    }
}