<?php

namespace Reservation\Model;

use Room\Model\RoomModel;

class ReservationModel {
    private int $id;

    private \DateTime $from;
    private \DateTime $to;

    private string $name;
    private string $email;
    private string $surname;

    private RoomModel $room;

    /**
     * Default RoomModel constructor; if id is not known, can be set to any value
     *
     * @param int $id
     * @param \DateTime $from
     * @param \DateTime $to
     * @param string $name
     * @param string $email
     * @param string $surname
     * @param RoomModel $room
     */
    public function __construct(
        int $id,\DateTime $from, \DateTime $to, string $name,
        string $email, string $surname, RoomModel $room,
    ) {
        $this->id =     $id;
        $this->from =   $from;
        $this->to =     $to;
        $this->name =   $name;
        $this->email =  $email;
        $this->surname = $surname;
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

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname() : string {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail() : string {
        return $this->email;
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