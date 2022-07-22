<?php

namespace Service;

class ValidationMessages
{
    public function validationsMsg(): void
    {
        define("FIRSTNAME_REQUIRED_FIELD", 'First name is required.');
        define("FIRSTNAME_FIELD_50_CHARACTERS", 'First name cannot be longer than 50 characters.');
        define("FIRSTNAME_CHARACTERS", 'First name: only letters are allowed.');
        define("LASTNAME_REQUIRED_FIELD", 'Last name is required.');
        define("LASTNAME_FIELD_50_CHARACTERS", 'Last name cannot be longer than 50 characters.');
        define("LASTNAME_CHARACTERS", 'Last name: only letters are allowed.');
        define("LOGIN_REQUIRED_FIELD", 'Login is required.');
        define("LOGIN_FIELD_50_CHARACTERS", 'Login cannot be longer than 50 characters.');
        define("LOGIN_CHARACTERS", 'Login: only letters and numbers are allowed.');
        define("EMAIL_REQUIRED_FIELD", 'Email is required.');
        define("EMAIL_FORMAT", 'Email must be in valid format: ex@example.com.');
        define("EMAIL_FIELD_50_CHARACTERS", 'Email cannot be longer than 50 characters.');
        define("PASSWORD_REQUIRED_FIELD", 'Password is required.');
        define("PASSWORD_LENGTH", 'Password must be minimum 8 characters log.');
        define("PASSWORD_FIELD_50_CHARACTERS", 'Password cannot be longer than 50 characters.');
        define(
            "PASSWORD_SPECIAL_CHARACTERS",
            'Password must include minimum: one lowercase, one uppercase, one number and one special character.'
        );
        define("PASSWORD_CONFIRM_REQUIRED_FIELD", 'Password confirm is required.');
        define("PASSWORD_CONFIRM", 'Entered passwords are different.');
        define("ROOM_REQUIRED", 'Room is required.');
        define("ROOM_NAME_REQUIRED", 'Room name is required.');
        define("ROOM_FIELD_50_CHARACTERS", 'Room name cannot be longer than 50 characters.');
        define("ROOM_CHARACTERS", 'First name: only letters, numbers and white spaces are allowed.');
        define("FLOOR_REQUIRED", 'Room floor is required.');
        define("FLOOR_FIELD_3_CHARACTERS", 'Floor is required.');
        define("FLOOR_CHARACTERS", 'Floor: only numbers are allowed.');
        define("START_DATE_REQUIRED", 'Date from is required.');
        define("END_DATE_REQUIRED", 'Date to is required.');


    }
}