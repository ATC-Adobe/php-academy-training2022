<?php

namespace Test\Unit\Api;

use Api\Api;
use PHPUnit\Framework\TestCase;
use System\Database\MySqlConnection;

class ApiTest extends TestCase {


    public function testRoomGet() {

        $api = new Api();
        $repo = new RoomRepoMock();

        $res = $api->getRooms($repo);

        $this->assertIsArray($res);

        foreach ($res as $entry) {

            $this->assertIsArray($entry);
            $this->assertCount(3, $entry);

            $this->assertIsInt($entry['id']);
            $this->assertIsInt($entry['floor']);
            $this->assertIsString($entry['name']);
        }

        $this->assertUniqueIds($res);
    }

    public function testActiveReservations() {

        $api = new Api();
        $repo = new ReservationRepoMock();

        $res = $api->getActiveReservations($repo);

        $this->assertUniqueIds($res);
    }


    public function testUserReservations() {

        $api = new Api();
        $repo = new ReservationRepoMock();

        $res = $api->getUserReservations(1, $repo);

        $this->assertIsArray($res);
        $this->assertUniqueIds($res);
    }

    public function assertUniqueIds(array $arr) {

        // since it is impossible to check if all ids are unique in linear time, might as well sort
        // the array and check neighbouring ids for uniqueness in O(n log n) time

        if(count($arr) < 2) {
            return;
        }

        usort($arr, fn($a, $b) => $a['id'] - $b['id']);

        for($a = $arr[0], $b = $arr[$i = 1];
            $i < count($arr);
            $a = $b, $b = $arr[++$i] ?? 0
        ) {
            $this->assertNotEquals($a['id'], $b['id']);
        }
    }
}
