<?php

namespace Factory;

use Reservation\ReservationCsv;
use Reservation\ReservationJson;
use Reservation\ReservationService;
use Reservation\ReservationXml;

class ReservationsFactory
{
    private $dataType;

    public function __construct($dataType)
    {
        $this->dataType = $dataType;
    }

    public function getReservationType()
    {
        switch ($this->dataType) {
            case "database":
                $object = new ReservationService();
                break;
            case "csv":
                $object = new ReservationCsv();
                break;
            case "xml":
                $object = new ReservationXml();
                break;
            case "json":
                $object = new ReservationJson();
                break;
            default:
                echo 'Wybierz miejsce zapisu danych!';
                break;
        }
        return $object;
    }
}