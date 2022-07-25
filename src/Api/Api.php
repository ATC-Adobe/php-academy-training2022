<?php

namespace Api;

use System\Database\MySqlConnection;

class Api {

    public function getRooms() {
        $res = MySqlConnection::getInstance()
            ->query("SELECT * FROM Rooms")
            ->fetchAll();

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

        $res = MySqlConnection::getInstance()
            ->query("SELECT * FROM Reservations WHERE time_from >= 
                                 STR_TO_DATE('".
                                (new \DateTime())->format('d/m/y H:i:s')
                                ."', '%d/%m/%y %H:%i:%s');")
            ->fetchAll();

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

        $res = MySqlConnection::getInstance()
            ->query("SELECT * FROM Reservations WHERE user_id = '".$id."';")
            ->fetchAll();

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