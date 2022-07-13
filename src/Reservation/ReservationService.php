<?php

namespace Reservation;

use Reservation\ReservationModel;

class ReservationService
{

    public function createReservation(array $dataReservation)
    {
        $reservationModel = new ReservationModel();
        $reservationModel->createReservation($dataReservation);

        $reservationRepository = new ReservationRepository();
        $reservationRepository->addReservation($reservationModel);
    }

    public function updateReservation(array $updateReservation)
    {
        $updatedModel = new ReservationModel();
        $updatedModel->updateReservation($updateReservation);

        $updatedRepository = new ReservationRepository();
        $updatedRepository->updateReservation($updatedModel);
    }

}