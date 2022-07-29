<?php

    namespace Api\Reservation;

    use GraphQL\Type\Definition\ObjectType;
    use GraphQL\Type\Definition\Type;
    use GraphQL\GraphQL;
    use GraphQL\Type\Schema;
    use Exception;
    use Reservation\Service\ReservationService;

    class GraphqlApi {
        public function reservations () :void {
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

            $mutationType = new ObjectType([
                'name' => 'Mutation',
                'fields' => [
                    'addReservation' => [
                        'type' => Type::string(),
                        'args' => [
                            'room_id' => ["type" => Type::nonNull(Type::int())],
                            'firstname' => ["type" => Type::nonNull(Type::string())],
                            'lastname' => ["type" => Type::nonNull(Type::string())],
                            'email' => ["type" => Type::nonNull(Type::string())],
                            'start_date' => ["type" => Type::nonNull(Type::string())],
                            'end_date' => ["type" => Type::nonNull(Type::string())],
                            'user_id' => ["type" => Type::nonNull(Type::int())]
                        ],
                        'resolve' => function ($rootValue, array $args) {
                            $service = new ReservationService();
                            $service->addReservation();
                            return "Success";
                        }
                    ]
                ]
            ]);

            $schema = new Schema([
                'query' => $queryType,
                'mutation' => $mutationType
            ]);

            try {
                $rawInput = file_get_contents('php://input');
                $input = json_decode($rawInput, true);
                $query = $input['query'];
                $values = $input['variables'] ?? null;
                $root = ['prefix' => 'Data: '];

                $result = GraphQL::executeQuery($schema, $query, $root, null, $values);
                $data = $result->toArray();
            } catch (Exception $e) {
                $data = [
                    'errors' => [
                        [
                            'message' => $e->getMessage(),
                        ]
                    ]
                ];
            }
            echo json_encode($data);
        }
    }