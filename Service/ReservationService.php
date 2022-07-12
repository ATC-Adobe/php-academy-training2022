<?php

namespace App\Service;

use App\Model\ReservationModel;
use App\Model\RoomModel;
use App\Repository\ReservationRepository;
use App\System\Database\Connection;
use PDO;

class ReservationService
{
    protected ReservationRepository $repo;
    public function __construct()
    {
        $this->repo = new ReservationRepository();
    }

    public function readReservations(): bool|array
    {
        return $this->repo->readAll();
    }

    public function checkReservationCollision(ReservationModel $newReservation): bool
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

    public function addReservation(ReservationModel $room): bool
    {
        return $this->repo->save($room);
    }
}