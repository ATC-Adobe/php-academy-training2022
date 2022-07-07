<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class ReservationService extends BasicService
{
    protected $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(protected string $filename = "./data/reservations.json")
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
     * @return Reservation[]|SimpleXMLElement
     */
    public function readReservations() : array|SimpleXMLElement {
        //Last item in csv is the latest
        $result = $this->reader->readFile();
        if($this->extension !== "xml") {
            $result = Util::mapResultsToObjects($result);
        }
        return $result;
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

    public function saveReservation(array $reservation): bool {
        //generate id by reading file
        if($this->extension === "csv") {
            $reservationToSave = $this->reorderColumns($reservation);
            //generate reservation id
            array_unshift($reservationToSave, $this->generateId());
        }
        else {
            $reservation['reservation_id']= $this->generateId();
        }
        return $this->reader->AppendToFile($reservation);

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