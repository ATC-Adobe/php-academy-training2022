<?php

namespace System\File\DBAdapter;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Room\Model\RoomModel;
use System\Database\MySqlConnection;
use System\File\IFileWriter;

class DBWriter implements IFileWriter {
    public function writeLine(ReservationModel $reservation) : bool {

        $reservationRepository = new ReservationConcreteRepository();

        $valid =
            $reservationRepository
                ->checkForTimeCollisions(
                    $reservation->getRoom()->getId(),
                    $reservation->getFrom(),
                    $reservation->getTo()
                );

        if( !$valid ) {
            return false;
        }

        $reservationRepository
            ->addReservation($reservation);

        return true;
    }

    public function closeStream() : void {
        // nothing to be done here
    }

}