<?php

include_once "./CsvHandler.php";
class ReservationService
{
    protected $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(protected string $filename = "./data/reservations.csv")
    {
    }

    private function reorderColumns(array $reservation) {
        $result = [];
        foreach ($this->columns as $col) {
            foreach ($reservation as $key => $value) {
                if($key == $col) {
                    $result[] = $value;
                }
            }
        }
        return $result;
    }

    private function getRowNumCsv() {
        $file = new SplFileObject($this->filename, 'r');
        $file->seek(PHP_INT_MAX);
        return $file->key() + 1;
    }

    public function saveReservationsCsv(array $reservation) : bool {
        $file = new SplFileObject($this->filename, 'a');
        $reservationToSave = $this->reorderColumns($reservation);
        array_unshift($reservationToSave, $this->getRowNumCsv());
        $ok = $file->fputcsv($reservationToSave);
        return $ok;
    }
    //Last item in csv is the latest
    public function readReservations() : array {
        return array_reverse(CsvHandler::readFile($this->filename, $this->columns));
    }
    public function checkReservationCollision(array $newReservation): bool {
        $reservations = $this->readReservations();
        foreach ($reservations as $reservation) {
            if($newReservation['room_id'] == $reservation['room_id']) {
                if ($newReservation['start_date'] < $reservation['end_date'] && $newReservation['end_date'] > $reservation['start_date']) {
                    return false;
                }
            }
        }
        return true;
    }
}