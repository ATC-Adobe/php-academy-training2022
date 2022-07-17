<?php

namespace Reservation;

use Factory\IReservation;

class ReservationService implements IReservation
{
    public function createReservation($dataReservation)
    {
        $reservationModel = new ReservationModel();
        $reservationModel->sendDataToModel($dataReservation);

        $reservationRepository = new ReservationRepository();
        $reservationRepository->addReservation($reservationModel);
    }
}