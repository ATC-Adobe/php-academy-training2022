<?php

namespace System\Util;

class DateFormatter {
    public static function htmlDateToDateTime(string $date) : \DateTime {
        return new \DateTime($date);
    }


    public static function dateTimeToString(\DateTime $date) : string {
        return $date->format('d-m-Y H:i:s');
    }

}