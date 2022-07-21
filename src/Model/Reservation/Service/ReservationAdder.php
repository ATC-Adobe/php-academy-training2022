<?php

namespace Model\Reservation\Service;

use Model\Reservation\Model\ReservationModel;
use Model\Room\Repository\RoomConcreteRepository;
use Model\User\Repository\UserConcreteRepository;
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
        string $roomId, string $userId,  \DateTime $from,    \DateTime $to
    ) : bool {

        $roomNId = intval($roomId);


        $room = (new RoomConcreteRepository())
            ->getRoomById($roomNId);

        if($room === null) {
            return false;
        }

        $user = (new UserConcreteRepository())
            ->getUserById(intval($userId));

        if($user === null) {
            return false;
        }

        return $strategy
            ->writeLine(
                new ReservationModel(
                    0,
                    $from,
                    $to,
                    $user,
                    $room,
                ),

            );
    }
}