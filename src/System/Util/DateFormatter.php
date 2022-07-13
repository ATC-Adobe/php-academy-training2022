<?php

namespace System\Util;

class DateFormatter {
    public static function htmlDateToDateTime(string $date) : \DateTime {
        //echo $date;
        $from = date("d/m/y H:i:s", strtotime($date));
        //echo $from;
        return \DateTime::createFromFormat("d/m/y H:i:s", $from);
    }


    public static function dateTimeToString(\DateTime $date) : string {

    }

    public static function  sqlDateToDateTime(string $date) : \DateTime {

    }
}