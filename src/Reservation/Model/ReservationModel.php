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

    public function getFrom() : \DateTime {
        return $this->from;
    }

    public function getTo() : \DateTime {
        return $this->to;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getSurname() : string {
        return $this->surname;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getRoom() : RoomModel {
        return $this->room;
    }
}