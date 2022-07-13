<?php

    namespace Reservation\Model;
    use DateTime;
    use Room\Model\RoomModel;

    class ReservationModel {

        private int $reservationId;
        private RoomModel $room;
        private string $firstName;
        private string $lastName;
        private string $email;
        private DateTime $startDate;
        private DateTime $endDate;

        public function __construct (
            int       $reservationId,
            RoomModel $room,
            string    $firstName,
            string    $lastName,
            string    $email,
            DateTime  $startDate,
            DateTime  $endDate
        ) {
            $this->reservationId    = $reservationId;
            $this->room             = $room;
            $this->firstName        = $firstName;
            $this->lastName         = $lastName;
            $this->email            = $email;
            $this->startDate        = $startDate;
            $this->endDate          = $endDate;
        }

        public function getReservationId() :int {
            return $this->reservationId;
        }

        public function getRoom() :RoomModel {
            return $this->room;
        }

        public function getFirstName() :string {
            return $this->firstName;
        }

        public function getLastName() :string {
            return $this->lastName;
        }

        public function getEmail() :string {
            return $this->email;
        }

        public function getStartDate() :DateTime {
            return $this->startDate;
        }

        public function getEndDate() :DateTime {
            return $this->endDate;
        }
    }