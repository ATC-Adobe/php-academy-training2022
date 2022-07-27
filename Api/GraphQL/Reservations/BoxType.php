<?php

namespace Api\GraphQl\Reservations;

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
                'startDate' => ['type' => Type::string()],
                'endDate' => ['type' => Type::string()]
            ]
        ];
        parent::__construct($config);
    }
}