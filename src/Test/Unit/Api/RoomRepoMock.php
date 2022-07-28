<?php

namespace Test\Unit\Api;

use Model\Room\Repository\RoomConcreteRepository;

class RoomRepoMock extends RoomConcreteRepository {

    public function getRoomsRaw(): array {
        return [
            ['id' => 20, 'floor' => 1, 'name' => 'Room', 'some' => 'garbage'],
            ['id' => '2', 'floor' => 1, 'name' => 'Room'],
            ['id' => 3, 'floor' => 1, 'name' => 'Room'],
            ['id' => 6, 'floor' => 2, 'name' => 'Room', 'even' => 'more garbage'],
            ['id' => 5, 'floor' => '2', 'name' => 'Room'],
        ];
    }

}