<?php

include_once "./types.php";
class JsonHandler implements FileHandler
{
    public function __construct(protected string $filename)
    {
    }

    public function readFile(): array|false {
        $str = file_get_contents($this->filename);
        if($str === false) {
            return false;
        }
        $data = json_decode($str, true);
        if($data === null) {
            return false;
        }
        $data = Util::mapResultsToObjects($data);
        return $data;
    }
    public function appendToFile(array $keyValuePairs): bool {
        $str = file_get_contents($this->filename);
        $temp = json_decode($str);
        $temp[]= $keyValuePairs;
        $data = json_encode($temp);
        return boolval(file_put_contents($this->filename, $data));
    }
}