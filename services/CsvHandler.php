<?php

include_once "./types.php";
class CsvHandler implements FileHandler
{
    public function __construct(protected string $filename)
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
    public function readFile(?array $columns = null): array {
        $results = [];
        $csvResults = $this->readWholeFile();
        // map array to key value pairs
        if($columns !== null) {
            foreach ($csvResults as $i => $row) {
                $results[]= [];
                foreach ($row as $j => $value) {
                    $results[$i][$columns[$j]] = $value;
                }
            }
        }
//        echo '<pre>';
//        var_dump($results);
//        echo '</pre>';
        return $results;
    }
    public function AppendToFile(array $values): bool {
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