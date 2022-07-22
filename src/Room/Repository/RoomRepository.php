<?php

    namespace Room\Repository;

    use Room\Model\RoomModel;
    use System\Database\MysqlConnection;
    use System\Session\Session;
    use System\StatusHandler\Status;

    class RoomRepository {

        public function addRoom (RoomModel $room) :void {
            $session = Session::getInstance();

            $name   = $room->getName();
            $floor  = $room->getFloor();

            if ($this->checkRoomExist($name, $floor)) {
                $session->set('room', Status::ROOM_EXIST);
                header ('Location: ./room.php');
                die();
            }

            $query = "INSERT INTO rooms(name, floor)
                                    VALUES('$name', $floor);";
            MysqlConnection::getInstance()->query($query);

            $session->set('room', Status::ROOM_OK);
            header ('Location: ./room.php');
            die();
        }

        public function getById (int $id) :RoomModel {
            $query  = "SELECT * FROM rooms WHERE room_id=".$id.";";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            foreach ($result as $r) {
                $room = new RoomModel ($r['room_id'], $r['name'], $r['floor']);
            }

            return $room;
        }

        public function getAllRooms () :array {
            $query  = "SELECT * FROM rooms";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            $array = [];
            foreach ($result as $r) {
                $array[] = new RoomModel ($r['room_id'], $r['name'], $r['floor']);
            }

            return $array;
        }

        public function deleteRoom (int $id) :void {
            $instance = MysqlConnection::getInstance();
            $session = Session::getInstance();
            $query  = "DELETE FROM rooms WHERE room_id=".$id.";";

            if ($instance->query($query)) {
                $session->set('room', Status::ROOM_DELETE_OK);
            } else {
                $session->set('room', Status::ROOM_DELETE_ERROR);
            }
            header ('Location: ./index.php');
            die();
        }

        public function checkRoomExist (string $name, int $floor) :bool {
            $query  = "SELECT * FROM rooms WHERE name='".$name."' AND floor=$floor;";
            $result = MysqlConnection::getInstance()->query($query)->fetchAll();

            if (count($result) > 1) {
                return true;
            }
            return false;
        }
    }