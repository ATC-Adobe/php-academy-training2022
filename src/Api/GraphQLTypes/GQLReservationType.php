<?php

namespace Api\GraphQLTypes;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GQLReservationType extends GQLSingleton {

    protected static ?GQLSingleton $instance = null;

    protected function __construct() {
        parent::__construct([
            'name' => 'Reservation',
            'fields' => [
                'id'        => ['type' => Type::int(), ],
                'room_id'   => ['type' => Type::int(), ],
                'user_id'   => ['type' => Type::int(), ],
                'time_from' => ['type' => Type::string(), ],
                'time_to'   => ['type' => Type::string(), ],
            ]
        ]);
    }
}