<?php

class CsvHandler
{
    static protected function readWholeFile($filename) {
        $result = [];
        $file = new SplFileObject($filename, 'r');
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            $result[] = $row;
        }
        array_pop($result);
        return $result;
    }
    static public function readFile(string $filename, array $columns) {
        $results = [];
        $csvResults = CsvHandler::readWholeFile($filename);
        // change array to key value pairs
        foreach ($csvResults as $i => $row) {
            $results[]= [];
            foreach ($row as $j => $value) {
                $results[$i][$columns[$j]] = $value;
            }
        }
//        echo '<pre>';
//        var_dump($results);
//        echo '</pre>';
        return $results;
    }
}