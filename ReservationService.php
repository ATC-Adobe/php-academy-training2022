<?php

include_once "./CsvHandler.php";
class ReservationService
{
    protected $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(protected string $filename = "./data/reservations.csv")
    {
    }

    private function getRowNumCsv() {
        $file = new SplFileObject($this->filename, 'r');
        $file->seek(PHP_INT_MAX);
        return $file->key() + 1;
    }

    public function saveReservationsCsv(array $reservation) : bool {
        $file = new SplFileObject($this->filename, 'a');
        array_unshift($reservation, $this->getRowNumCsv());
        $ok = $file->fputcsv($reservation);
        return $ok;
    }
    //Last item in doc is the latest
    public function readReservations() : array {
        return array_reverse(CsvHandler::readFile($this->filename, $this->columns));
    }
}