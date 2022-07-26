<?php

namespace App\Api\Graphql;

use App\Api\ApiControllerJson;
use App\Service\ReservationService;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;


class ApiControllerGraphql {
    public function listAllReservations() {
        $reservationType = new ObjectType([
            'name' => 'Reservation',
            'fields' => [
                'id' => [
                    'type' => Type::int(),
                ],
                'room_id' => [
                    'type' => Type::int(),
                ],
                'user_id' => [
                    'type' => Type::int(),
                ],
                'start_date' => [
                    'type' => Type::string(),
                ],
                'end_date' => [
                    'type' => Type::string(),
                ]
            ],
        ]);

        $queryType = new ObjectType([
            'name' => 'Query',
            'fields'=> [
                'reservations' => [
                    'type' => Type::listOf($reservationType),
                    'resolve' => function() {
                        return (new ReservationService())->readReservations();
                    }
                ],
                "activeReservations" => [
                    'type' =>Type::listOf($reservationType),
                    'resolve' => function() {
                        $reservations = (new ReservationService())->readReservations();
                        foreach ($reservations as $reservation) {
                            if(strtotime($reservation->start_date) > time() || strtotime($reservation->end_date) > time()) {
                                $results[]= $reservation;
                            }
                        }
                        return $results;
                    }
                ],
                "usersReservations" => [
                    'type' => Type::listOf($reservationType),
                    'args' => [
                        'id' => ['type' => Type::nonNull(Type::int())],
                    ],
                    'resolve' => function($rootValue, array $args) {
                        $reservations = (new ReservationService())->findUsersReservations(intval($args['id']));
                        return $reservations;
                    }
                ]
            ]
        ]);

        $schema = new \GraphQL\Schema([
            'query' => $queryType
        ]);

        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);
        $query = $input['query'];
        $variableValues = $input['variables'] ?? null;
        $rootValue = ['prefix' => 'You said: '];

        try {
            $result = GraphQL::executeAndReturnResult($schema, $query, $rootValue, null, $variableValues);
            $output = $result->toArray();
        } catch (\Exception $e) {
            $output = [
                'errors' => [
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            ];
        }
        echo json_encode($output);
    }
}

