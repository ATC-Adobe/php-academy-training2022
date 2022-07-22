<?php

namespace System;

class Status {
    public const NONE = 0;
    public const OK = 1;

    public const REGISTER_OK = 2;
    public const REGISTER_FIELD_EMPTY = 3;
    public const REGISTER_USERNAME_OR_EMAIL_TAKEN = 4;
    public const REGISTER_EMAIL_INVALID = 5;
    public const REGISTER_PASSWORD_NOT_MATCH = 6;
    public const REGISTER_PASSWORD_TOO_WEAK = 7;

    public const LOGIN_INVALID = 8;

    public const ROOM_INVALID = 9;
    public const ROOM_OK = 10;

    public const RESERVATION_OK = 11;
    public const RESERVATION_COLLISION = 12;
    public const RESERVATION_DATE_INCORRECT = 13;

    public const RESERVATION_REMOVE_OK = 14;
    public const RESERVATION_REMOVE_ERROR = 15;

    public const PARAMETER_ERROR = 16;

    public const AUTH_LOGIN_REQUIRED = 17;

    public const EDIT_PASS_REQ = 18;
    public const EDIT_PASS_SUCCESS = 19;
    public const EDIT_USER_OK = 20;


    // TODO: Comply with SRP => move this to different class
    public static function getString(int $status) : array {
        return match($status) {
            self::NONE =>
                ['info', 'No errors'],
            self::OK =>
                ['success', 'Success'],



            self::REGISTER_OK =>
                ['success', 'Registration successful'],
            self::REGISTER_FIELD_EMPTY =>
                ['error', 'Empty field'],
            self::REGISTER_USERNAME_OR_EMAIL_TAKEN =>
                ['error', 'Username or email are taken'],
            self::REGISTER_EMAIL_INVALID =>
                ['error', 'Invalid email'],
            self::REGISTER_PASSWORD_NOT_MATCH =>
                ['error', 'Passwords don\'t match' ],
            self::REGISTER_PASSWORD_TOO_WEAK =>
                ['error', 'Password is too weak'],



            self::LOGIN_INVALID =>
                ['error', 'Login invalid'],



            self::ROOM_INVALID =>
                ['error', 'Room invalid'],
            self::ROOM_OK =>
                ['success', 'Room added successfully'],



            self::RESERVATION_OK =>
                ['success', 'Room reserved successfully'],
            self::RESERVATION_COLLISION =>
                ['error', 'Room is already reserved'],
            self::RESERVATION_DATE_INCORRECT =>
                ['error', 'Dates are incorrect'],



            self::RESERVATION_REMOVE_OK =>
                ['success', 'Reservation removed successfully'],
            self::RESERVATION_REMOVE_ERROR =>
                ['error', 'An error occurred while deleting reservation'],



            self::PARAMETER_ERROR  =>
                ['error', 'Invalid parameters, try again'],



            self::AUTH_LOGIN_REQUIRED =>
                ['error', 'To perform this action user must be logged in'],


            self::EDIT_PASS_REQ =>
                ['error', 'Invalid old password'],
            self::EDIT_PASS_SUCCESS =>
                ['success', 'Password updated successfully'],
            self::EDIT_USER_OK =>
                ['success', 'Data successfully edited'],

            default =>
                ['info', 'Unknown code'],
        };
    }
}
