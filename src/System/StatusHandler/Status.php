<?php

    namespace System\StatusHandler;

    class Status {
        public const NONE = 0;
        public const OK = 1;

        public const REGISTER_OK = 10;
        public const REGISTER_EMPTY_FIELDS = 11;
        public const REGISTER_WRONG_EMAIL = 12;
        public const REGISTER_USER_OR_EMAIL_TAKEN = 13;
        public const REGISTER_WEAK_PASSWORD = 14;
        public const REGISTER_ERROR = 15;

        public const LOGIN_OK = 20;
        public const LOGIN_INVALID = 21;
        public const LOGIN_ERROR = 22;
        public const LOGIN_REQUIRED = 23;
        public const LOGOUT_OK = 25;
        public const LOGOUT_ERROR = 26;

        public const ROOM_OK = 30;
        public const ROOM_INVALID = 31;
        public const ROOM_EXIST = 32;
        public const ROOM_ERROR = 33;
        public const ROOM_DELETE_OK = 34;
        public const ROOM_DELETE_ERROR = 35;

        public const RESERVATION_OK = 40;
        public const RESERVATION_PAST_DATE = 41;
        public const RESERVATION_INCORRECT_DATE = 42;
        public const RESERVATION_ROOM_NOT_AVAILABLE = 43;
        public const RESERVATION_ERROR = 44;
        public const RESERVATION_DELETE_OK = 45;
        public const RESERVATION_DELETE_ERROR = 46;

        public static function getStatus(int $status) :array {
            $param = match($status) {
                self::NONE
                    => ['danger', 'No error specified!'],
                self::OK
                    => ['success', 'Success!'],

                self::REGISTER_OK
                    => ['success', 'Registration was successful! Now you can login.'],
                self::REGISTER_EMPTY_FIELDS
                    => ['danger', 'The fields are empty'],
                self::REGISTER_WRONG_EMAIL
                    => ['danger', 'Invalid or unsupported email type!'],
                self::REGISTER_USER_OR_EMAIL_TAKEN
                    => ['danger', 'Username or Email is taken!'],
                self::REGISTER_WEAK_PASSWORD
                    => ['danger', 'Your password is too weak!'],
                self::REGISTER_ERROR
                    => ['danger', 'Something went wrong while registering your account!'],

                self::LOGIN_OK
                    => ['success', 'You have been logged in!'],
                self::LOGIN_INVALID
                    => ['danger', 'Invalid username or password!'],
                self::LOGIN_ERROR
                    => ['danger', 'Something went wrong while logging to your account!'],
                self::LOGIN_REQUIRED
                    => ['danger', 'You need login to perform this action!'],
                self::LOGOUT_OK
                    => ['success', 'You have been logged out!'],
                self::LOGOUT_ERROR
                    => ['danger', 'Something went wrong while logging out from your account!'],

                self::ROOM_OK
                    => ['success', 'Room added succesfully!'],
                self::ROOM_INVALID
                    => ['danger', 'Invalid name or floor!'],
                self::ROOM_EXIST
                    => ['danger', 'This room already exist'],
                self::ROOM_ERROR
                    => ['danger', 'Something went wrong while adding room!'],
                self::ROOM_DELETE_OK
                    => ['success', 'Room removed succesfully!'],
                self::ROOM_DELETE_ERROR
                    => ['danger', 'Something went wrong while removing room!'],

                self::RESERVATION_OK
                    => ['success', 'Reservation added succesfully!'],
                self::RESERVATION_PAST_DATE
                    => ['danger', 'The start date cannot be earlier than the current time!'],
                self::RESERVATION_INCORRECT_DATE
                    => ['danger', 'The start date of the reservation cannot be older than the end date!'],
                self::RESERVATION_ROOM_NOT_AVAILABLE
                    => ['danger', 'Room is not available in this date. Try different date!'],
                self::RESERVATION_ERROR
                    => ['danger', 'Something went wrong while adding reservation!'],
                self::RESERVATION_DELETE_OK
                    => ['success', 'Reservation removed succesfully!'],
                self::RESERVATION_DELETE_ERROR
                    => ['danger', 'Something went wrong while removing reservation!'],

                default
                    => ['danger', 'Unhandled exception, contact with administrator!'],
            };
            return ['type' => $param[0], 'msg' => $param[1]];
        }
    }