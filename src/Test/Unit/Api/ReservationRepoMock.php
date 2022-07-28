<?php

namespace Test\Unit\Api;

use Model\Reservation\Repository\ReservationConcreteRepository;

class ReservationRepoMock extends ReservationConcreteRepository {

    public function getActiveReservationsRaw(): array {

        return [
            [
                'id' => 10,
                'room_id' => 6,
                'user_id' => 5,
                'time_from' => '2050-05-07',
                'time_to' => '2050-06-07',
            ],
            [
                'id' => 13,
                'room_id' => 7,
                'user_id' => 5,
                'time_from' => '2050-05-07',
                'time_to' => '2050-06-07',
            ],
            [
                'id' => 20,
                'room_id' => '70',
                'user_id' => 55,
                'time_from' => '2050-05-07',
                'time_to' => '2050-06-07',
                'some' => 'garbage'
            ],
        ];

    }

    public function getUserReservationsRaw(int $id): array {
        if($id == 10) {
            return  [[
                'id' => 20,
                'room_id' => '70',
                'user_id' => 10,
                'time_from' => '2050-05-07',
                'time_to' => '2050-06-07',
                'some' => 'garbage'
            ]];
        }

        if($id == 5)
        return [
            [
                'id' => 10,
                'room_id' => 6,
                'user_id' => 5,
                'time_from' => '2050-05-07',
                'time_to' => '2050-06-07',
            ],
            [
                'id' => 13,
                'room_id' => 7,
                'user_id' => 5,
                'time_from' => '2050-05-07',
                'time_to' => '2050-06-07',
            ],
        ];

        return [];
    }

}