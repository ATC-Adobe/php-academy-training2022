<?php

namespace Api;

use Model\Reservation\Repository\ReservationConcreteRepository;
use Model\Room\Repository\RoomConcreteRepository;
use System\Database\MySqlConnection;

class Api {

    public function getRooms() : array {
        $res = (new RoomConcreteRepository())->getRoomsRaw();

        $entries = [];

        foreach ($res as $entry) {
            if(count($entry) != 0) {
                $entries[] = [
                    "id" => $entry['id'],
                    "name" => $entry["name"],
                    "floor" => $entry['floor'],
                ];
            }
        }


        return $entries;
    }

    public function getActiveReservations() : array {

        $res = (new ReservationConcreteRepository())
            ->getActiveReservationsRaw();

        $entries = [];

        foreach ($res as $entry) {
            if(count($entry) != 0) {
                $entries[] = [
                    "id" => $entry['id'],
                    "user_id" => $entry["user_id"],
                    "room_id" => $entry['room_id'],
                    "time_from" => $entry['time_from'],
                    "time_to" => $entry['time_to'],
                ];
            }
        }


        return $entries;
    }

    public function getUserReservations(int $id) : array {

        $res = (new ReservationConcreteRepository())
            ->getUserReservationsRaw($id);

        $entries = [];

        foreach ($res as $entry) {
            if(count($entry) != 0) {
                $entries[] = [
                    "id" => $entry['id'],
                    "user_id" => $entry["user_id"],
                    "room_id" => $entry['room_id'],
                    "time_from" => $entry['time_from'],
                    "time_to" => $entry['time_to'],
                ];
            }
        }

        return $entries;
    }
}