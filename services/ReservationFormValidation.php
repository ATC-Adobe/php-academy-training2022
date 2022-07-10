<?php

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
        if (empty($_POST['room_id'] && strlen($_POST['room_id']) < 5)) {
            $error .= '<p class="text-danger">Room id is required.</p>';
        } else {
            $roomId = $_POST['room_id'];
        }
        if (empty(
            $_POST['firstname'] && strlen($_POST['firstname']) < 50 && preg_match(
                "/^[a-zA-Z ]*$/",
                $_POST['firstname']
            )
        )) {
            $error .= '<p class="text-danger">Firstname is required. First name cannot be longer than 50 characters. Only letters and white spaces are allowed. </p>';
        } else {
            $firstName = $_POST["firstname"];
        }
        if (empty(
            $_POST['lastname'] && strlen($_POST['firstname']) < 50 && preg_match(
                "/^[a-zA-Z ]*$/",
                $_POST['firstname']
            )
        )) {
            $error .= '<p class="text-danger">Last name is required. Last name cannot be longer than 50 characters. Only letters and white spaces are allowed.</p>';
        } else {
            $lastName = $_POST["lastname"];
        }
        if (empty($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $error .= '<p class="text-danger">Email is required. Remember about email format: ex@example.com .</p>';
        } else {
            $email = $_POST["email"];
        }
        if (empty($_POST['start_date'])) {
            $error .= '<p class="text-danger">Date from is required.</p>';
        } else {
            $startDate = $_POST["start_date"];
        }
        if (empty($_POST['end_date'])) {
            $error .= '<p class="text-danger">Date to is required.</p>';
        } else {
            $endDate = $_POST["end_date"];
        }
        return array($error, $roomId, $firstName, $lastName, $email, $startDate, $endDate);
    }
}