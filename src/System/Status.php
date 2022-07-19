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
    public const ROOM_OK = 14;

    public const RESERVATION_OK = 10;
    public const RESERVATION_COLLISION = 11;
    public const RESERVATION_DATE_INVERSION = 12;

    public const RESERVATION_REMOVE_OK = 15;
    public const RESERVATION_REMOVE_ERROR = 16;

    public const PARAMETER_ERROR = 13;
}
