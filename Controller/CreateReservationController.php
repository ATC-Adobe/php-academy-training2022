<?php

namespace Controller;

use Repository\ReservationFormValidation;
use Service\CreateCsvReservation;
use Service\CreateDbReservation;
use Service\CreateJsonReservation;
use Service\CreateXmlReservation;
use Service\ReservationContext;
use Service\ApplicationService;
use Service\Session;

class CreateReservationController
{
    public function createReservation(
        string $error,
        string $roomId,
        string $userId,
        string $firstName,
        string $lastName,
        string $email,
        string $startDate,
        string $endDate
    ): array {
        $sessionMsg = new Session();
        if (isset($_POST['submit'])) {
            [
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            ] = (new ReservationFormValidation())->validated(
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateDbReservation());
                $context->createReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate);
            }
            $sessionMsg->sessionMessage('reservationCreated');
            (new ApplicationService())->getReservationListHeader();
        }
        if (isset($_POST['submit-csv'])) {
            [
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            ] = (new ReservationFormValidation())->validated(
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateCsvReservation());
                $context->createReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate);
            }
            $sessionMsg->sessionMessage('reservationCreated');
            (new ApplicationService())->getReservationListHeader();
        }
        if (isset($_POST['submit-json'])) {
            [
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            ] = (new ReservationFormValidation())->validated(
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateJsonReservation());
                $context->createReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate);
            }
            $sessionMsg->sessionMessage('reservationCreated');
            (new ApplicationService())->getReservationListHeader();
        }
        if (isset($_POST['submit-xml'])) {
            [$error, $roomId, $firstName, $lastName, $email, $startDate, $endDate] = (new ReservationFormValidation(
            ))->validated(
                $error,
                $roomId,
                $userId,
                $firstName,
                $lastName,
                $email,
                $startDate,
                $endDate
            );
            if ($error == '') {
                $context = new ReservationContext(new CreateXmlReservation());
                $context->createReservation($roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate);
            }
            $sessionMsg->sessionMessage('reservationCreated');
            (new ApplicationService())->getReservationListHeader();
        }
        return array($error, $roomId, $userId, $firstName, $lastName, $email, $startDate, $endDate);
    }
}