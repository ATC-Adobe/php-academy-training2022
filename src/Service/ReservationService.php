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
            if ($newReservation->room_id == $reservation->room_id) {
                if ($newReservation->start_date < $reservation->end_date && $newReservation->end_date > $reservation->start_date) {
                    return false;
                }
            }
        }
        return true;
    }

    public function addReservation(Reservation $room): bool
    {
        return $this->ioStrategy->save($room);
    }
    public function deleteReservation(int $id): bool {
        return $this->ioStrategy->delete($id);
    }
    /**
     * @param \IOHandlerInterface $ioStrategy
     */
    public function setIoStrategy(\IOHandlerInterface $ioStrategy): void
    {
        $this->ioStrategy = $ioStrategy;
    }

}