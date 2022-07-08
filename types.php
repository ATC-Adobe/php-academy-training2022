<?php

interface FileHandlerInterface {
    /**
     * @return iterable<Reservation>|false
     */
    public function readFile(): iterable|false;
    public function appendToFile(array $values): bool;
}

/**
 * @property string|int id
 * @property string name
 * @property string|int floor
 */
interface Room {
}

/**
 * @property string|int room_id
 * @property string|int reservation_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string start_date
 * @property string end_date
 */
interface Reservation {
}