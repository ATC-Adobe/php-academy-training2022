<?php

namespace Api\GraphQLTypes;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GQLRoomType extends GQLSingleton {

    protected static ?GQLSingleton $instance = null;

    protected function __construct() {
        parent::__construct([
            'name' => 'Room',
            'fields' => [
                'name'  => [ 'type' => Type::string(), ],
                'floor' => [ 'type' => Type::int(), ],
                'id'    => [ 'type' => Type::int(), ],
            ]
        ]);
    }

}