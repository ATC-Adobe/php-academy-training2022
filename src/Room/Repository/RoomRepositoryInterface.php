<?php

    namespace Room\Repository;
    use Room\Model\RoomModel;

    interface RoomRepositoryInterface
    {
        public function addRoom(RoomModel $room) :void;

        public function getById(int $id) :RoomModel;

        public function getAllRooms() :array;

        public function removeRoom(int $id) :void;
    }