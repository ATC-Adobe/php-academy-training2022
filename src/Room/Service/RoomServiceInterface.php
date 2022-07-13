<?php

    namespace Room\Service;
    use Room\Model\RoomModel;

    interface RoomServiceInterface
    {
        public function addRoom(RoomModel $room);

        public function getById(int $id);

        public function getAllRooms();

        public function removeRoom(int $id);
    }