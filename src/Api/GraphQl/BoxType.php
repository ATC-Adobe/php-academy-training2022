<?php

namespace Api\GraphQl;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class BoxType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'reservationId' => ['type' => Type::int()],
                'roomId' => ['type' => Type::int()],
                'userId' => ['type' => Type::int()],
                'firstName' => ['type' => Type::string()],
                'lastName' => ['type' => Type::string()],
                'email' => ['type' => Type::string()],
                'startDay' => ['type' => Type::string()],
                'endDay' => ['type' => Type::string()],
                'startHour' => ['type' => Type::string()],
                'endHour' => ['type' => Type::string()]
            ]
        ];
        parent::__construct($config);
    }
}