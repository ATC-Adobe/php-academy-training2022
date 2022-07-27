<?php

namespace Api\GraphQL\Reservations;

class TypeRegistry
{
private static $boxType;
private static $queryType;


    public static function getQueryType(): QueryType
    {
        return self::$queryType ?: (self::$queryType = new QueryType);
    }

    public static function getBoxType(): BoxType
    {
        return self::$boxType ?:(self::$boxType = new BoxType);
    }
}