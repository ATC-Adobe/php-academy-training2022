<?php

interface FileHandler {
    public function readFile(): mixed;
    public function AppendToFile(array $values): bool;
}

/**
 * @property string|int id
 * @property string name
 * @property string|int floor
 */
interface Room {
}
