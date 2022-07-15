<?php

namespace Repository;

use Service\ApplicationService;
use SplFileObject;

class ReservationCsvRepository
{
    private $list;

    public function __construct()
    {
        $this->list = new SplFileObject((new ApplicationService())->getCsvReservationUrl(), 'r');
    }

    public function getList(): array
    {
        $this->list->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::READ_AHEAD);
        $reservations = [];
        foreach ($this->list as $reservation) {
            $reservations [] = [
                'reservation_id' => $reservation[0],
                'room_id' => $reservation[1],
                'firstname' => $reservation[2],
                'lastname' => $reservation[3],
                'email' => $reservation[4],
                'start_date' => $reservation[5],
                'end_date' => $reservation[6],
            ];
        }
        return $reservations;
    }
}