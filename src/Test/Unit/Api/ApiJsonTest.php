<?php

namespace Test\Unit\Api;

use Api\ApiJson;
use Model\Reservation\Repository\ReservationConcreteRepository;
use Model\Room\Repository\RoomConcreteRepository;
use PHPUnit\Framework\TestCase;

class ApiJsonTest extends TestCase {

    public function testRoomsGet() {

        $mock = $this->createMock(RoomConcreteRepository::class);
        $mock->method('getRoomsRaw')->willReturn([
            ['id' => 20, 'floor' => 1, 'name' => 'Room', 'some' => 'garbage'],
            ['id' => '2', 'floor' => 1, 'name' => 'Room'],
            ['id' => 3, 'floor' => 1, 'name' => 'Room'],
            ['id' => 6, 'floor' => 2, 'name' => 'Room', 'even' => 'more garbage'],
            ['id' => 5, 'floor' => '2', 'name' => 'Room'],
        ]);

        $api = new ApiJson($mock);
        $res = $api->getRooms();

        $this->assertEquals(
            '[{"id":20,"name":"Room","floor":1},{"id":2,"name":"Room","floor":1},{"id":3,"name":"Room","floor":1},{"id":6,"name":"Room","floor":2},{"id":5,"name":"Room","floor":2}]', $res
        );
    }

    public function testActiveReservations() {

        $mock = $this->createMock(ReservationConcreteRepository::class);
        $mock->method('getActiveReservationsRaw')->willReturn([
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
        ]);

        $api = new ApiJson($this->createMock(RoomConcreteRepository::class), $mock);

        $res = $api->getActiveReservations();

        $this->assertEquals(
            '[{"id":10,"user_id":5,"room_id":6,"time_from":"2050-05-07","time_to":"2050-06-07"},{"id":13,"user_id":5,"room_id":7,"time_from":"2050-05-07","time_to":"2050-06-07"},{"id":20,"user_id":55,"room_id":70,"time_from":"2050-05-07","time_to":"2050-06-07"}]', $res
        );
    }

    /**
     * @param $id
     * @param $expected
     * @return void
     *
     * @dataProvider userReservations
     */
    public function testUserReservations($id, $expected, $mockData) {

        $mock = $this->createMock(ReservationConcreteRepository::class);
        $mock->method('getUserReservationsRaw')
            ->willReturn($mockData);

        $api = new ApiJson($this->createMock(RoomConcreteRepository::class), $mock);

        $res = $api->getUserReservations($id);

        $this->assertEquals($res, $expected);

    }

    public function userReservations() : array {
        return [
            [10, '[{"id":20,"user_id":10,"room_id":70,"time_from":"2050-05-07","time_to":"2050-06-07"}]',
                    [[
                        'id' => 20,
                        'room_id' => '70',
                        'user_id' => 10,
                        'time_from' => '2050-05-07',
                        'time_to' => '2050-06-07',
                        'some' => 'garbage'
                    ]]
            ],
            [5, '[{"id":10,"user_id":5,"room_id":6,"time_from":"2050-05-07","time_to":"2050-06-07"},{"id":13,"user_id":5,"room_id":7,"time_from":"2050-05-07","time_to":"2050-06-07"}]',
                    [
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
                    ]
            ],
            [20, '[]',
                [[]]
            ],
        ];
    }

}
