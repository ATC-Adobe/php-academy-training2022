<?php

namespace Model\Reservation\Service;

use Model\Reservation\Model\ReservationModel;
use Model\Room\Repository\RoomConcreteRepository;
use Model\User\Repository\UserConcreteRepository;
use System\File\IFileWriter;
use System\Router\Response;
use System\Status;

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
    ) : int {

        if($to <= $from || $from < new \DateTime()) {
            return Status::RESERVATION_DATE_INCORRECT;
        }

        $roomNId = intval($roomId);


        $room = (new RoomConcreteRepository())
            ->getRoomById($roomNId);

        if($room === null) {
            return Status::PARAMETER_ERROR;
        }

        $user = (new UserConcreteRepository())
            ->getUserById(intval($userId));

        if($user === null) {
            return Status::PARAMETER_ERROR;
        }

        $res = $strategy
            ->writeLine(
                new ReservationModel(
                    0,
                    $from,
                    $to,
                    $user,
                    $room,
                ),

            );

        if($res) {
            return Status::RESERVATION_OK;
        }
        else {
            return Status::RESERVATION_COLLISION;
        }
    }
}