<?php

namespace Repository;

use Service\ValidationMessages;

class ReservationFormValidation
{
    public function validated(
        string $error,
        mixed $roomId,
        mixed $firstName,
        mixed $lastName,
        mixed $email,
        mixed $startDate,
        mixed $endDate
    ): array {
        (new ValidationMessages())->validationsMsg();
        if (empty($_POST['room_id'])) {
            $error .= ROOM_REQUIRED . '<br>';
        } else {
            $roomId = $_POST['room_id'];
        }
        if (empty($_POST['firstname'])) {
            $error .= FIRSTNAME_REQUIRED_FIELD . '<br>';
        } elseif (strlen($_POST['firstname']) > 50) {
            $error .= FIRSTNAME_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", ($_POST['firstname']))) {
            $error .= FIRSTNAME_CHARACTERS . '<br>';
        } else {
            $firstName = $_POST['firstname'];
        }
        if (empty($_POST['lastname'])) {
            $error .= LASTNAME_REQUIRED_FIELD . '<br>';
        } elseif
        (strlen($_POST['lastname']) > 50) {
            $error .= LASTNAME_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", ($_POST['lastname']))) {
            $error .= LASTNAME_CHARACTERS . '<br>';
        } else {
            $lastName = $_POST["lastname"];
        }
        if (empty($_POST['email'])) {
            $error .= EMAIL_REQUIRED_FIELD . '<br>';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error .= EMAIL_FORMAT . '<br>';
        } elseif (strlen($_POST['email']) > 50) {
            $error .= EMAIL_FIELD_50_CHARACTERS . '<br>';
        } else {
            $email = $_POST['email'];
        }
        if (empty($_POST['start_date'])) {
            $error .= START_DATE_REQUIRED . '<br>';
        } else {
            $startDate = $_POST['start_date'];
        }
        if (empty($_POST['end_date'])) {
            $error .= END_DATE_REQUIRED . '<br>';
        } else {
            $endDate = $_POST['end_date'];
        }
        return array($error, $roomId, $firstName, $lastName, $email, $startDate, $endDate);
    }
}