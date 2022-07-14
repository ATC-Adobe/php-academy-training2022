<?php


namespace App\System\File;

use IOHandlerInterface;

class JsonHandler implements IOHandlerInterface
{
    public function __construct(protected string $filename)
    {
    }

    public function readAll(): array|false
    {
        $str = file_get_contents($this->filename);
        if ($str === false) {
            return false;
        }
        $data = json_decode($str, true);
        if ($data === null) {
            return false;
        }
        $res =  Util::mapResultsToObjects($data);
//        var_dump($res);
        return $res;
    }

    public function save(\ModelInterface $model): bool
    {
        var_dump($model);
        $keyValuePairs = $model->toArray();
        //genereate id
        $temp = $this->readAll();
        $keyValuePairs["id"] = count($temp) + 1;

        var_dump($keyValuePairs);

        $str = file_get_contents($this->filename);
        $temp = json_decode($str);
        $temp[] = $keyValuePairs;
        $data = json_encode($temp);
        return boolval(file_put_contents($this->filename, $data));
    }
}