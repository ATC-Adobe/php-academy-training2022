<?php

use PHPUnit\Framework\TestCase;
use Api\Rest\Room\RoomApi;
use Reservation\ReservationRepository;

class RoomApiTest extends TestCase
{
    public function testGetAllReservations_Pass()
    {
        $mock = $this->createMock(ReservationRepository::class);

        $mock->method("getAllReservations")->willReturn([
            [
                'id' => 154,
                'userId' => 28,
                'roomId' => 31,
                'firstName' => 'Angelika',
                'lastName' => 'Mlynarczyk',
                'email' => 'angelikam@wp.pl',
                'startDay' => '2022-07-27',
                'endDay' => '2022-07-27',
                'startHour' => '15:00:00',
                'endHour' => '16:00:00'
            ]
        ]);

        $roomApi = new RoomApi();
        $expectedResult = $roomApi->getAllReservations($mock);

        $this->assertEquals(
            '[{
        "reservationId": 154,
        "userId": 28,
        "roomId": 31,
        "firstName": "Angelika",
        "lastName": "Mlynarczyk",
        "email": "angelikam@wp.pl",
        "startDay": "2022-07-27",
        "endDay": "2022-07-27",
        "startHour": "15:00:00",
        "endHour": "16:00:00"
    }    
    ]',
            $expectedResult
        );
    }
}