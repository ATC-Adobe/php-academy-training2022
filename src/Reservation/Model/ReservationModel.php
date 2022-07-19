<?php

namespace Reservation\Model;

use Room\Model\RoomModel;
use User\Model\UserModel;

class ReservationModel {
    private int $id;

    private \DateTime $from;
    private \DateTime $to;

    private UserModel $user;

    private RoomModel $room;

    /**
     * Default RoomModel constructor; if id is not known, can be set to any value
     *
     * @param int $id
     * @param \DateTime $from
     * @param \DateTime $to
     * @param UserModel $user
     * @param RoomModel $room
     */
    public function __construct(
        int $id,\DateTime $from, \DateTime $to, UserModel $user, RoomModel $room,
    ) {
        $this->id =     $id;
        $this->from =   $from;
        $this->to =     $to;
        $this->user =   $user;
        $this->room =   $room;
    }

    /**
     * @return \DateTime
     */
    public function getFrom() : \DateTime {
        return $this->from;
    }

    /**
     * @return \DateTime
     */
    public function getTo() : \DateTime {
        return $this->to;
    }

    public function getUser() : UserModel {
        return $this->user;
    }

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * @return RoomModel
     */
    public function getRoom() : RoomModel {
        return $this->room;
    }
}