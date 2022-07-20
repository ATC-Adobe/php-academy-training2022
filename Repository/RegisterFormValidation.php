<?php

namespace Repository;

class RegisterFormValidation

{
    public function validationsMsg(): void
    {
        define("REQUIRED_FIELD_VALIDATION", 'This field is required');
        define("EMAIL_FORMAT_VALIDATION", 'Email must be in valid format: ex@example.com');
        define("FIELD_50_CHARACTERS_VALIDATION", 'This field cannot be longer than 50 characters');
        define("CHARACTERS_VALIDATION", 'Only letters are allowed');
        define("PASSWORD_LENGTH_VALIDATION", 'Password must be minimum 8 characters log');
        define(
            "SPECIAL_CHARACTERS_VALIDATION",
            'Password must include minimum: one lowercase, one uppercase, one number and one special character'
        );
        define("PASSWORD_CONFIRM_VALIDATION", 'Entered passwords are different');
    }

    public function validated(
        string $error,
        string $firstName,
        string $lastName,
        string $login,
        string $email,
        string $password,
        string $passwordConfirm,

    ): array {
        if (empty($_POST['firstname'])) {
            $error .= REQUIRED_FIELD_VALIDATION;
        } elseif
        (strlen($_POST['firstname']) > 50) {
            $error .= FIELD_50_CHARACTERS_VALIDATION;
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", ($_POST['firstname']))) {
            $error .= CHARACTERS_VALIDATION;
        }
        if (empty($_POST['lastname'])) {
            $error .= REQUIRED_FIELD_VALIDATION;
        } elseif
        (strlen($_POST['lastname']) > 50) {
            $error .= FIELD_50_CHARACTERS_VALIDATION;
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", ($_POST['lastname']))) {
            $error .= CHARACTERS_VALIDATION;
        }
        if (empty($_POST['login'])) {
            $error .= REQUIRED_FIELD_VALIDATION;
        } elseif
        (strlen(($_POST['login'])) > 50) {
            $error .= FIELD_50_CHARACTERS_VALIDATION;
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", $_POST['login'])) {
            $error .= CHARACTERS_VALIDATION;
        }
        if (empty($_POST['email'])) {
            $error .= REQUIRED_FIELD_VALIDATION;
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error .= EMAIL_FORMAT_VALIDATION;
        } elseif
        (strlen($_POST['email']) > 50) {
            $error .= FIELD_50_CHARACTERS_VALIDATION;
        }
        if (empty($_POST['password'])) {
            $error .= REQUIRED_FIELD_VALIDATION;
        } elseif (strlen($_POST['password']) < 8) {
            $error .= PASSWORD_LENGTH_VALIDATION;
        } elseif
        (strlen($_POST['password']) > 50) {
            $error .= FIELD_50_CHARACTERS_VALIDATION;
        } elseif
        (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password'])) {
            $error .= SPECIAL_CHARACTERS_VALIDATION;
        }
        if (empty($_POST['confirm-password'])) {
            $error .= REQUIRED_FIELD_VALIDATION;
        } elseif (strlen($_POST['confirm-password']) < 8) {
            $error .= PASSWORD_LENGTH_VALIDATION;
        } elseif
        (strlen($_POST['confirm-password']) > 50) {
            $error .= FIELD_50_CHARACTERS_VALIDATION;
        } elseif
        (!preg_match(
                "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/",
                $_POST['confirm-password']
            )) {
            $error .= SPECIAL_CHARACTERS_VALIDATION;
        } elseif ($_POST['confirm-password'] !== $_POST['password']) {
            $error .= PASSWORD_CONFIRM_VALIDATION;
        }

        return array($error, $firstName, $lastName, $login, $email, $password, $passwordConfirm);
    }
}