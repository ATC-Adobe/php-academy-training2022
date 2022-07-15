<?php

namespace App\Service;

use App\Model\Reservation;
use App\Repository\ReservationRepository;
use App\Repository\RoomRepository;

class ReservationService implements \IOStrategyContextInterface
{
    public function __construct(protected \IOHandlerInterface $ioStrategy = new ReservationRepository())
    {
    }

    /**
     * @param bool $withRelations
     * @return bool|iterable<Reservation>
     */
    public function readReservations(bool $withRelations = false): bool|iterable
    {
        //csv, json and xml doesn't implement that!!
        if($withRelations) {
            if(method_exists($this->ioStrategy, "readWithRelations")) {
                return $this->ioStrategy->readWithRelations();
            }
            echo "Type doesn't support joins";
            return false;
        }
        return $this->ioStrategy->readAll();
    }

    public function checkReservationCollision(Reservation $newReservation): bool
    {
        $reservations = $this->readReservations();
        foreach ($reservations as $reservation) {
            if ($newReservation->room_id == $reservation->room_id && $newReservation->id != $reservation->id) {
                if ($newReservation->start_date < $reservation->end_date && $newReservation->end_date > $reservation->start_date) {
                    return false;
                }
            }
        }
        return true;
    }
    public function findOne(int $id): bool|Reservation
    {
        if(method_exists($this->ioStrategy, "findOne")) {
            return $this->ioStrategy->findOne($id);
        }
        echo "Chosen strategy doesn't support that";
        return false;
    }

    public function addReservation(Reservation $reservation): bool
    {
        return $this->ioStrategy->save($reservation);
    }
    public function deleteReservation(int $id): bool {
        return $this->ioStrategy->delete($id);
    }
    public function updateReservation(Reservation $reservation) {
        if(method_exists($this->ioStrategy, "updateOne")) {
            return $this->ioStrategy->updateOne($reservation);
        }
        echo "Chosen strategy doesn't support that";
        return false;
    }
    /**
     * @param \IOHandlerInterface $ioStrategy
     */
    public function setIoStrategy(\IOHandlerInterface $ioStrategy): void
    {
        $this->ioStrategy = $ioStrategy;
    }

}