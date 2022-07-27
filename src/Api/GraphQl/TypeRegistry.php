<?php

namespace Api\GraphQl;

use Api\GraphQl\QueryType;
use Api\GraphQl\BoxType;

class TypeRegistry
{
    private static $boxType;
    private static $queryType;

    public static function getQueryType(): QueryType
    {
        return self::$queryType ?: (self::$queryType = new QueryType());
    }

    public static function getBoxType(): BoxType
    {
        return self::$boxType ?:(self::$boxType = new BoxType());
    }
}