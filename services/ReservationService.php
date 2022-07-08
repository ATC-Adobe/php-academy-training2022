<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class ReservationService extends BasicService
{
    protected $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(protected string $filename = "./data/reservations.csv")
    {
        parent::__construct($filename, $this->columns, "reservation");
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

    /**
     * @return iterable<Reservation>|false
     */
    public function readReservations() : iterable|false {
        return  $this->reader->readFile();
    }

    public function checkReservationCollision(array $newReservation): bool {
        $reservations = $this->readReservations();
        foreach ($reservations as $reservation) {
            if($newReservation['room_id'] == $reservation->room_id) {
                if ($newReservation['start_date'] < $reservation->end_date && $newReservation['end_date'] > $reservation->start_date) {
                    return false;
                }
            }
        }
        return true;
    }

    public function saveReservation(array $reservation): bool {
        $reservation['reservation_id']= $this->generateId();
        if($this->extension === "csv") {
            $reservation = $this->reorderColumns($reservation);
        }
        return $this->reader->appendToFile($reservation);
    }

    protected function generateId(): int {
        if($this->extension === "csv") {
            return $this->reader->getRowNumCsv();
        }
        else {
            $data = $this->reader->readFile();
            return count($data) + 1;
        }
    }
}