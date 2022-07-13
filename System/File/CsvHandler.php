<?php


namespace App\System\File;

use IOHandlerInterface;
use ModelInterface;
use SplFileObject;

class CsvHandler implements IOHandlerInterface
{
    protected array $columns = [
        "id", "room_id",  "first_name",  "last_name",  "email",  "start_date",  "end_date",
    ];
    public function __construct(protected string $filename, )
    {
    }

    protected function readWholeFile(): array
    {
        $result = [];
        $file = new SplFileObject($this->filename, 'r');
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            $result[] = $row;
        }
        // check if last element is blank line
        if (count($result[array_key_last($result)]) <= 1) {
            array_pop($result);
        }
        return $result;
    }

    public function readAll(): array
    {
        $results = [];
        $csvResults = $this->readWholeFile();
        // map array to key value pairs
        if ($this->columns !== null) {
            foreach ($csvResults as $i => $row) {
                $results[] = [];
                foreach ($row as $j => $value) {
                    $results[$i][$this->columns[$j]] = $value;
                }
            }
        }
        return Util::mapResultsToObjects($results);
    }

    public function save(ModelInterface $model): bool
    {
        $keyValuePairs = $model->toArray();
        //generate id
        $keyValuePairs["id"] = $this->getRowNumCsv();
        $keyValuePairs = $this->reorderColumns($keyValuePairs);
        $file = new SplFileObject($this->filename, 'a');
        return $file->fputcsv($keyValuePairs);
    }

    public function getRowNumCsv(): int
    {
        $file = new SplFileObject($this->filename, 'r');
        $file->seek(PHP_INT_MAX);
        return $file->key() + 1;
    }

    private function reorderColumns(array $reservation): array
    {
        $result = [];
        foreach ($this->columns as $col) {
            foreach ($reservation as $key => $value) {
                if ($key == $col) {
                    $result[] = $value;
                }
            }
        }
        return $result;
    }
}