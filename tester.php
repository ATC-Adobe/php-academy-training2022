<?php

require_once 'autoloading.php';

$reservation =
    (new \Reservation\Repository\ReservationConcreteRepository())
    ->getReservationById(1);

echo $reservation->getEmail();

echo $reservation->getRoom()->getName();

$room = (new \Room\Repository\RoomConcreteRepository())
        ->getRoomById(6);

echo $room->getName();