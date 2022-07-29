<?php

namespace Model;

use DateTimeZone;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class DateTimeFormatter {

    private const STRING_FORMAT = 'Y-m-d H:i:s';
    private const HTML_FORMAT   = 'Y-m-d\TH:i:s';
    private const SQL_FORMAT    = 'd/m/y H:i:s';

    private static function toFormat(\DateTime $date, string $format) : string {
        return $date->format($format);
    }


    public static function toString(\DateTime $date) : string {
        return self::toFormat($date, self::STRING_FORMAT);
    }

    public static function toHtml(\DateTime $date) : string {
        return self::toFormat($date, self::HTML_FORMAT);
    }

    public static function toSql(\DateTime $date) : string {
        return self::toFormat($date, self::SQL_FORMAT);
    }




    private static function fromFormat(string $date, string $format) : \DateTime {
        return \DateTime::createFromFormat($format, $date);
    }


    public static function fromHtml(string $date) : \DateTime {
        return self::fromFormat($date, self::HTML_FORMAT);
    }

    public static function fromString(string $date) : \DateTime {
        return self::fromFormat($date, self::STRING_FORMAT);
    }

    public static function fromSql(string $date) : \DateTime {
        return self::fromFormat($date, self::SQL_FORMAT);
    }
}