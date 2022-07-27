<?php

namespace Validations;

use Session\Session;

class DateAndTimeValidation
{
    public function checkDatesAndHours($startDay, $endDay, $startHour, $endHour)
    {
        $today = date("Y-m-d");

        if ($startDay < $today || $startDay > $endDay) {
            $value = 'wrongDates';
            $session = new Session();
            $session->set($value);
        } elseif ($startHour === $endHour || $startHour > $endHour) {
            $value = 'wrongHours';
            $session = new Session();
            $session->set($value);
        } else {
            return 'true';
        }
    }
}