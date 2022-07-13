<?php
namespace App\System\File;

class Util
{
    public static function mapResultsToObjects(array $data): array {
        $results = [];
        foreach ($data as $room) {
            $results[]= (object)$room;
        }
        return $results;
    }
}