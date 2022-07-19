<?php

    namespace Reservation\Model;
    use DateTime;
    use Room\Model\RoomModel;
    use User\Model\UserModel;

    class ReservationModel {

        private int $reservationId;
        private RoomModel $room;
        private string $firstName;
        private string $lastName;
        private string $email;
        private DateTime $startDate;
        private DateTime $endDate;
        private UserModel $user;

        public function __construct (
            int       $reservationId,
            RoomModel $room,
            string    $firstName,
            string    $lastName,
            string    $email,
            DateTime  $startDate,
            DateTime  $endDate,
            UserModel $user
        ) {
            $this->reservationId    = $reservationId;
            $this->room             = $room;
            $this->firstName        = $firstName;
            $this->lastName         = $lastName;
            $this->email            = $email;
            $this->startDate        = $startDate;
            $this->endDate          = $endDate;
            $this->user             = $user;
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

        public function getUser() :UserModel {
            return $this->user;
        }

        public function setUser(UserModel $user): void {
            $this->user = $user;
        }
    }