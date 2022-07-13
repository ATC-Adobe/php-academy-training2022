<?php

namespace App\Service;

use App\Model\Reservation;
use App\Repository\ReservationRepository;
use App\Repository\RoomRepository;

class ReservationService implements \IOStrategyContextInterface
{
    public function __construct(protected \IOHandlerInterface $io = new ReservationRepository())
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
            if(method_exists($this->io, "readWithRelations")) {
                return $this->io->readWithRelations();
            } else {
                return false;
            }
        }
        return $this->io->readAll();
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
        return $this->io->save($room);
    }
    /**
     * @param \IOHandlerInterface $io
     */
    public function setIoStrategy(\IOHandlerInterface $io): void
    {
        $this->io = $io;
    }

}