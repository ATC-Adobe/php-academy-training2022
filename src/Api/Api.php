<?php

namespace Api;

use Model\Reservation\Repository\ReservationConcreteRepository;
use Model\Room\Repository\RoomConcreteRepository;
use System\Database\MySqlConnection;

class Api {

    public function getRooms(
        RoomConcreteRepository $repo = new RoomConcreteRepository()
    ) : array {

        $res = $repo->getRoomsRaw();

        $entries = [];

        foreach ($res as $entry) {
            if(count($entry) != 0) {
                $entries[] = [
                    "id" => intval($entry['id']),
                    "name" => $entry["name"],
                    "floor" => intval($entry['floor']),
                ];
            }
        }


        return $entries;
    }

    public function getActiveReservations(
        ReservationConcreteRepository $repo = new ReservationConcreteRepository()
    ) : array {

        $res = $repo->getActiveReservationsRaw();

        $entries = [];

        foreach ($res as $entry) {
            if(count($entry) != 0) {
                $entries[] = [
                    "id" => intval($entry['id']),
                    "user_id" => intval($entry["user_id"]),
                    "room_id" => intval($entry['room_id']),
                    "time_from" => $entry['time_from'],
                    "time_to" => $entry['time_to'],
                ];
            }
        }


        return $entries;
    }

    public function getUserReservations(
        int $id,
        ReservationConcreteRepository $repo = new ReservationConcreteRepository()
    ) : array {

        $res = $repo->getUserReservationsRaw($id);

        $entries = [];

        foreach ($res as $entry) {
            if(count($entry) != 0) {
                $entries[] = [
                    "id" => intval($entry['id']),
                    "user_id" => intval($entry["user_id"]),
                    "room_id" => intval($entry['room_id']),
                    "time_from" => $entry['time_from'],
                    "time_to" => $entry['time_to'],
                ];
            }
        }

        return $entries;
    }
}