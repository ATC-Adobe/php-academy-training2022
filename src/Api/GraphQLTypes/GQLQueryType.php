<?php

namespace Api\GraphQLTypes;

use GraphQL\Type\Definition\Type;

class GQLQueryType extends GQLSingleton {

    protected static ?GQLSingleton $instance;

    public function __construct(array $config) {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'rooms' => [
                    'type' => Type::listOf(GQLRoomType::getInstance()),
                    'resolve' => function() {
                        return
                            (new \Api\Api())->getRooms();
                    }
                ],
                'reservations' => [
                    'type' => Type::listOf(GQLReservationType::getInstance()),
                    'resolve' => function() {
                        return ((new \Api\Api())->getActiveReservations());
                    }
                ],
                'user' => [
                    'type' => Type::listOf(GQLReservationType::getInstance()),
                    'args' => [
                        'id' => ['type' => Type::int()],
                    ],
                    'resolve' => function($root, $args) {

                        return ((new \Api\Api())->getUserReservations(
                            intval($args['id'])));
                    }
                ],
                'dice' => [
                    'type' => GQLDiceType::getInstance(),
                    'args' => [
                        'count'     => ['type' => Type::nonNull(Type::int())],
                        'dice'      => ['type' => Type::nonNull(Type::listOf(Type::int()))],
                        'include'   => ['type' => Type::nonNull(Type::listOf(Type::int()))],
                    ],
                    'resolve' => GQLDiceType::getResolver(),
                ]
            ],
        ]);
    }

}