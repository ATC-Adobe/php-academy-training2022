<?php

namespace Reservation\Service;

use Reservation\Model\ReservationModel;
use Reservation\Repository\ReservationConcreteRepository;
use Room\Repository\RoomConcreteRepository;
use System\File\FileWriterFactory;
use System\File\IFileWriter;

class ReservationAdder {

    /**
     * Validates data and stores them using given strategy
     *
     * @param IFileWriter $strategy
     * @param string $roomId
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param \DateTime $from
     * @param \DateTime $to
     * @return bool
     */
    public function uploadData(
        IFileWriter $strategy,
        string $roomId, string $name,       string $surname,
        string $email,  \DateTime $from,    \DateTime $to
    ) : bool {

        $roomNId = intval($roomId);

        if($surname == '' || $name == '' || $email == '')
            return false;

        $room = (new RoomConcreteRepository())
            ->getRoomById($roomNId);

        if($room === null) {
            return false;
        }

        return $strategy
            ->writeLine(
                new ReservationModel(
                    0,
                    $from,
                    $to,
                    $name,
                    $email,
                    $surname,
                    $room
                ),

            );
    }
}