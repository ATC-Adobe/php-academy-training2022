<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class ReservationService extends BasicService
{
    protected $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(protected string $filename = "./data/reservations.xml")
    {
        parent::__construct($filename, $this->columns, "reservation");
    }
    /**
     * @return iterable<Reservation>|false
     */
    public function readReservations() : iterable|false {
        return  $this->fileHandler->readFile();
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
        return $this->fileHandler->appendToFile($reservation);
    }
}