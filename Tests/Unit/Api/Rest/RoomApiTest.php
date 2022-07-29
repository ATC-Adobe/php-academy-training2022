<?php

use PHPUnit\Framework\TestCase;
use Api\Rest\Room\RoomApi;
use Reservation\ReservationRepository;

class RoomApiTest extends TestCase
{
    public function testGetAllReservations_Pass()
    {
        $repository = Mockery::mock("ReservationRepository");
        $repository->shouldReceive("getAllReservations")
            ->once()
            ->andReturn();
        $roomApi = new RoomApi();
        $roomApi->getAllReservations($repository);

    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}