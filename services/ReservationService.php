<?php

include_once "./services/BasicService.php";
include_once './Util.php';
class ReservationService
{
    protected ?Connection $connection = null;
//    protected array $columns = ['reservation_id', 'room_id', 'first_name', 'last_name', 'email', 'start_date', 'end_date'];
    public function __construct(
//        protected string $filename = "./data/reservations.xml"
)
    {
        $this->connection = Connection::getInstance();
//        parent::__construct($filename, $this->columns, "reservation");
    }

    public function readReservations(): bool|array
    {
//        return $this->fileHandler->readFile();
        return  $this->connection->query("SELECT * FROM reservation")->fetchAll(PDO::FETCH_OBJ);
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
//        $reservation['reservation_id']= $this->generateId();
//        return $this->fileHandler->appendToFile($reservation);
//        var_dump($reservation);
        $statement = $this->connection->prepare("
            INSERT INTO reservation ( room_id, first_name, last_name, email, start_date, end_date) VALUES (
                                                               :room_id,
                                                               :first_name,
                                                               :last_name,
                                                               :email,
                                                               :start_date,
                                                               :end_date
            );");
        return $statement->execute($reservation);
    }
}