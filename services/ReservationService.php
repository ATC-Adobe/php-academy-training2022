<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class ReservationService extends BasicService
{
    protected $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(protected string $filename = "./data/reservations.json")
    {
        parent::__construct($filename);
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

//    protected function saveReservationsCsv(array $reservation) : bool {
//        $reservationToSave = $this->reorderColumns($reservation);
//        //generate reservation id
//        array_unshift($reservationToSave, $this->reader->getRowNumCsv());
//        return $this->reader->AppendToFile($reservationToSave);
//    }

    public function readReservations() : array|SimpleXMLElement {
        //Last item in csv is the latest
        $result = null;
        if($this->extension === "csv") {
            $result = $this->reader->readFile($this->columns);
        }
        else {
            $result = $this->reader->readFile();
        }
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

    public function saveReservation(array $reservation) {
        $ok = false;
        //generate id by reading file
        if($this->extension === "csv") {
            $reservationToSave = $this->reorderColumns($reservation);
            //generate reservation id
            array_unshift($reservationToSave, $this->reader->getRowNumCsv());
            $ok = $this->reader->AppendToFile($reservationToSave);
        }
        else {
            $data = $this->reader->readFile();
            $id = count($data) + 1;
            $reservation['reservation_id']= $id;
            if($this->extension === "xml") {
                $ok = $this->reader->AppendToFile($reservation, "reservation");
            }
            //json
            else {
                $ok = $this->reader->AppendToFile($reservation);
            }
        }
        return $ok;
    }
}