<?php

    namespace Room\Repository;

    use Room\Model\RoomModel;
    use System\Database\MysqlConnection;

    class RoomRepository implements RoomRepositoryInterface {
        public function __construct() { }

        public function addRoom(RoomModel $room) :void {
            $name   = $room->getName();
            $floor  = $room->getFloor();

            $query = "INSERT INTO rooms(name, floor)
                                VALUES('$name', $floor);";
            MysqlConnection::getInstance()->query($query);
        }

        public function getById(int $id) :RoomModel {
            $query  = "SELECT * FROM rooms WHERE room_id=".$id.";";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            foreach ($result as $r) {
                $room = new RoomModel ($r['room_id'], $r['name'], $r['floor']);
            }

            return $room;
        }

        public function getAllRooms() :array {
            $query  = "SELECT * FROM rooms";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            $array = [];
            foreach ($result as $r) {
                $array[] = new RoomModel ($r['room_id'], $r['name'], $r['floor']);
            }

            return $array;
        }

        public function removeRoom(int $id) :void {
            $query  = "DELETE FROM rooms WHERE room_id=".$id.";";
            MysqlConnection::getInstance()->query($query);
        }
    }