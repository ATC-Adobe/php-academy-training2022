<?php

    namespace Api;

    use Api\Reservation\ReservationApi;

    use GraphQL\Type\Definition\ObjectType;
    use GraphQL\Type\Definition\Type;
    use GraphQL\GraphQL;
    use GraphQL\Schema;
    use Exception;

    class GraphqlApi {
        public function getAllReservations() {
            $reservation = new ObjectType([
                'name' => 'reservations',
                'fields' => [
                    'reservation_id' => [
                        'type' => Type::int(),
                    ],
                    'room_id' => [
                        'type' => Type::int(),
                    ],
                    'firstname' => [
                        'type' => Type::string(),
                    ],
                    'lastname' => [
                        'type' => Type::string(),
                    ],
                    'email' => [
                        'type' => Type::string(),
                    ],
                    'start_date' => [
                        'type' => Type::string(),
                    ],
                    'end_date' => [
                        'type' => Type::string(),
                    ],
                    'user_id' => [
                        'type' => Type::int(),
                    ]
                ],
            ]);

            $queryType = new ObjectType([
                'name' => 'Query',
                'fields' => [
                   'getAllReservations' => [
                       'type' => Type::listOf($reservation),
                       'resolve' => function () {
                           return (new ReservationApi())->getAllReservations();
                       }
                   ],
                   "getCurrentReservations" => [
                       'type' => Type::listOf($reservation),
                       'resolve' => function () {
                           return (new ReservationApi())->getCurrentReservations();
                       }
                   ],
                   "getUserReservations" => [
                       'type' => Type::listOf($reservation),
                       'args' => [
                           'user_id' => [
                               'type' => Type::nonNull(Type::int())
                           ],
                       ],
                       'resolve' => function ($rootValue, array $args) {
                           return (new ReservationApi())->getUserReservations(intval($args['user_id']));
                       }
                   ]
                ]
            ]);

            $schema = new Schema([
                'query' => $queryType
            ]);

            $rawInput = file_get_contents('php://input');
            $input = json_decode($rawInput, true);
            $query = $input['query'];
            $values = $input['variables'] ?? null;
            $root = ['prefix' => 'Data: '];

            try {
                $result = GraphQL::executeAndReturnResult($schema, $query, $root, null, $values);
                $data = $result->toArray();
            } catch (Exception $e) {
                $data = [
                    'errors' => [
                        [
                            'message' => $e->getMessage()
                        ]
                    ]
                ];
            }
            echo json_encode($data);
        }
    }