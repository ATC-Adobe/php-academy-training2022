<?php

namespace App\Service;

use App\Model\Reservation;
use App\Repository\ReservationRepository;

class ReservationService
{
    protected ReservationRepository $repo;
    public function __construct()
    {
        $this->repo = new ReservationRepository();
    }

    /**
     * @param bool $withRelations
     * @return bool|Reservation[]
     */
    public function readReservations(bool $withRelations = false): bool|array
    {
        if($withRelations) {
            return $this->repo->readWithRelations();
        }
        return $this->repo->readAll();
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
        return $this->repo->save($room);
    }
}