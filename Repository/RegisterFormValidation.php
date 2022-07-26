<?php

namespace Repository;

use Controller\RegisterController;
use Service\ValidationMessages;

class RegisterFormValidation extends RegisterController

{
    public function validated(
        string $error,
        string $firstName,
        string $lastName,
        string $login,
        string $email,
        string $password,
        string $passwordConfirm,
    ): array {
        (new ValidationMessages())->validationsMsg();
        if (empty($_POST['firstname'])) {
            $error .= FIRSTNAME_REQUIRED_FIELD . '<br>';
        } elseif (strlen($_POST['firstname']) > 50) {
            $error .= FIRSTNAME_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", ($_POST['firstname']))) {
            $error .= FIRSTNAME_CHARACTERS . '<br>';
        }
        if (empty($_POST['lastname'])) {
            $error .= LASTNAME_REQUIRED_FIELD . '<br>';
        } elseif
        (strlen($_POST['lastname']) > 50) {
            $error .= LASTNAME_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match("/^[a-zA-Z]*$/", ($_POST['lastname']))) {
            $error .= LASTNAME_CHARACTERS . '<br>';
        }
        if (empty($_POST['login'])) {
            $error .= LOGIN_REQUIRED_FIELD . '<br>';
        } elseif
        (strlen(($_POST['login'])) > 50) {
            $error .= LOGIN_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match("/^[a-zA-Z\d]*$/", $_POST['login'])) {
            $error .= LOGIN_CHARACTERS . '<br>';
        }
        if (empty($_POST['email'])) {
            $error .= EMAIL_REQUIRED_FIELD . '<br>';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error .= EMAIL_FORMAT . '<br>';
        } elseif (strlen($_POST['email']) > 50) {
            $error .= EMAIL_FIELD_50_CHARACTERS . '<br>';
        }
        if (empty($_POST['password'])) {
            $error .= PASSWORD_REQUIRED_FIELD . '<br>';
        } elseif (strlen($_POST['password']) < 8) {
            $error .= PASSWORD_LENGTH . '<br>';
        } elseif
        (strlen($_POST['password']) > 50) {
            $error .= PASSWORD_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password'])) {
            $error .= PASSWORD_SPECIAL_CHARACTERS . '<br>';
        }
        if (empty($_POST['confirm-password'])) {
            $error .= FIRSTNAME_REQUIRED_FIELD . '<br>';
        } elseif (strlen($_POST['confirm-password']) < 8) {
            $error .= PASSWORD_LENGTH . '<br>';
        } elseif
        (strlen($_POST['confirm-password']) > 50) {
            $error .= PASSWORD_FIELD_50_CHARACTERS . '<br>';
        } elseif
        (!preg_match(
                "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/",
                $_POST['confirm-password']
            )) {
            $error .= PASSWORD_SPECIAL_CHARACTERS . '<br>';
        } elseif ($_POST['confirm-password'] !== $_POST['password']) {
            $error .= PASSWORD_CONFIRM . '<br>';
        }

        return array($error, $firstName, $lastName, $login, $email, $password, $passwordConfirm);
    }
}