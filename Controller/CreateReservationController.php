<?php

namespace Controller;

use Repository\ReservationFormValidation;
use Service\CreateCsvReservation;
use Service\CreateDbReservation;
use Service\CreateJsonReservation;
use Service\CreateXmlReservation;
use Service\ReservationContext;
use Service\ApplicationService;

class CreateReservationController
{
    public function createReservation(
        string $error,
        string $roomId,
        string $firstName,
        string $lastName,
        string $email,
        string $startDate,
        string $endDate
    ): array {
        if (isset($_POST['submit'])) {
            [$error, $roomId, $firstName, $lastName, $email, $startDate, $endDate] = (new ReservationFormValidation(
            ))->validated(
                $error,
                $roomId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateDbReservation());
                $context->createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate);
            }
        }
        if (isset($_POST['submit-csv'])) {
            [$error, $roomId, $firstName, $lastName, $email, $startDate, $endDate] = (new ReservationFormValidation(
            ))->validated(
                $error,
                $roomId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateCsvReservation());
                $context->createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate);
            }
            (new ApplicationService())->getReservationListHeader();
        }
        if (isset($_POST['submit-json'])) {
            [$error, $roomId, $firstName, $lastName, $email, $startDate, $endDate] = (new ReservationFormValidation(
            ))->validated(
                $error,
                $roomId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateJsonReservation());
                $context->createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate);
            }
        }
        if (isset($_POST['submit-xml'])) {
            [$error, $roomId, $firstName, $lastName, $email, $startDate, $endDate] = (new ReservationFormValidation(
            ))->validated(
                $error,
                $roomId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateXmlReservation());
                $context->createReservation($roomId, $firstName, $lastName, $email, $startDate, $endDate);
            }
        }
        return array($error, $roomId, $firstName, $lastName, $email, $startDate, $endDate);
    }
}