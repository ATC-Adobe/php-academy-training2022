<?php

class ApplicationService
{
    public function getReservationListHeader(): void
    {
        header('location:reservations.php?msg=add');
    }

    public function getRows(): int
    {
        $rows = count(file("data/reservations.csv"));
        if ($rows > 1) {
            $rows = ($rows - 1) + 1;
        }
        return $rows;
    }
}