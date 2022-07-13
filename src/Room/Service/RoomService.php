<?php
    namespace Room\Service;

    use Room\Model\RoomModel;
    use Room\Repository\RoomRepository;

    class RoomService {
        public function __construct() {}

        public function addRoom(): void {
            $id = 0;
            $name = $_POST['name'];
            $floor = $_POST['floor'];

            $room = new RoomModel($id, $name, $floor);
            $roomRepository = new RoomRepository();

            $roomRepository->addRoom($room);
        }
    }