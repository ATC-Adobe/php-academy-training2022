<?php

class Util
{
    static public function mapResultsToObjects(array $data): array {
        $results = [];
        foreach ($data as $room) {
            $results[]= (object)$room;
        }
        return $results;
    }
}