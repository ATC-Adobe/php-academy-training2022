<?php

namespace services;

class ApplicationService
{
    public function getReservationListHeader(): void
    {
        header('location:reservations.php?msg=add');
    }
    public function getRoomsListHeader(): void
    {
        header('location:/View/rooms.php?msg=add');
    }
}