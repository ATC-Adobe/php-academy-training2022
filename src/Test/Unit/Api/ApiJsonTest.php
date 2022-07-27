<?php

namespace App\Test\Unit\Api;

use App\Api\ApiControllerJson;
use App\Api\ApiExecJson;
use App\Model\Reservation;
use App\Model\User;
use App\Repository\ReservationRepository;
use App\Service\ReservationService;
use PHPUnit\Framework\TestCase;

class ApiJsonTest extends TestCase
{
    public function testListReservation() {
        $service = $this->createMock(ReservationService::class);
        $reservation1 = new Reservation();
        $reservation1->id=1;
        $reservation1->room_id=2;
        $reservation1->user_id=3;
        $reservation1->start_date="2022-07-27 11:44:10";
        $reservation1->end_date="2022-07-27 12:44:10";
        $service->method("readReservations")->willReturn([$reservation1]);
        $res = (new ApiExecJson())->listReservations($service);
        $this->assertEquals($res, [$reservation1]);
    }
    public function testListActiveReservations() {
        $service = $this->createMock(ReservationService::class);
        $reservation1 = new Reservation();
        $reservation1->id=1;
        $reservation1->room_id=2;
        $reservation1->user_id=3;
        $reservation1->start_date="2022-07-27 11:44:10";
        $reservation1->end_date="2022-07-27 12:44:10";
        $reservation2 = new Reservation();
        $reservation2->id=2;
        $reservation2->room_id=2;
        $reservation2->user_id=3;
        $reservation2->start_date="2021-07-27 11:44:10";
        $reservation2->end_date="2021-07-27 12:44:10";
        $service->method("readReservations")->willReturn([$reservation1, $reservation2]);
        $res = (new ApiExecJson())->listReservations($service);
        $this->assertEquals($res[0]->id, $reservation1->id);
    }
    public function testListUsersReservations() {
        $reservation1 = new Reservation();
        $reservation1->id=1;
        $reservation1->room_id=2;
        $reservation1->user_id=3;
        $reservation1->start_date="2022-07-27 11:44:10";
        $reservation1->end_date="2022-07-27 12:44:10";
        $repo = $this->createMock(ReservationRepository::class);
        $repo->method("findBelongsToUser")->willReturn([$reservation1]);
        $service = new ReservationService($repo);
        $id=3;

        $res = (new ApiExecJson())->listUsersReservations($id, $service);
        $this->assertEquals($res[0]->id, $reservation1->id);


    }
}