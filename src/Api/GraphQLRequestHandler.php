<?php

namespace Api;

use GraphQL\GraphQL;
//use GraphQL\Schema;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use Model\Reservation\Service\ReservationAdder;
use System\File\FileWriterFactory;
use System\Util\Authenticator;

class GraphQLRequestHandler {
    public function graphQL() : void {

        // suppressing warnings
        error_reporting(E_ERROR | E_PARSE);

        try {

            // Room definition
            $roomType = new ObjectType([
                'name' => 'Room',
                'fields' => [
                    'name'  => [ 'type' => Type::string(), ],
                    'floor' => [ 'type' => Type::int(), ],
                    'id'    => [ 'type' => Type::int(), ],
                ]
            ]);

            // Reservation definition
            $reservationType = new ObjectType([
                'name' => 'Reservation',
                'fields' => [
                    'id'        => ['type' => Type::int(), ],
                    'room_id'   => ['type' => Type::int(), ],
                    'user_id'   => ['type' => Type::int(), ],
                    'time_from' => ['type' => Type::string(), ],
                    'time_to'   => ['type' => Type::string(), ],
                ]
            ]);

            // queries
            $queryType = new ObjectType([
                'name' => 'Query',
                'fields' => [
                    'rooms' => [
                        'type' => Type::listOf($roomType),
                        'resolve' => function() {
                            return
                                (new \Api\Api())->getRooms();
                        }
                    ],
                    'reservations' => [
                        'type' => Type::listOf($reservationType),
                        'resolve' => function() {
                            return ((new \Api\Api())->getActiveReservations());
                        }
                    ],
                    'user' => [
                        'type' => Type::listOf($reservationType),
                        'args' => [
                            'id' => ['type' => Type::int()],
                        ],
                        'resolve' => function($root, $args) {
                            return ((new \Api\Api())->getUserReservations(
                                intval($args['id'])));
                        }
                    ],
                ],
            ]);

            // mutation
            $mutationType = new ObjectType([
                'name' => 'Mutation',
                'fields' => [
                    'reserve' => [
                        'type' => Type::string(),
                        'args' => [
                            'room_id'   => ['type' => Type::int()],
                            'from'      => ['type' => Type::string()],
                            'to'        => ['type' => Type::string()],
                        ],
                        'resolve' => function ($calc, array $args) {

                            $res = Authenticator::verifyHTTPLogin(
                                $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']
                            );

                            if(!$res) {
                                return 'ERROR: Failed authorization';
                            }

                            try {
                                [$room_id, $from, $to] = [
                                    $args['room_id'],
                                    htmlentities($args['from']),
                                    htmlentities($args['to'])
                                ];

                                $id = intval($_REQUEST['user_id']);

                                $from = new \DateTime($from);
                                $to = new \DateTime($to);
                            }
                            catch(\Exception $e) {
                                return ('ERROR: Invalid Parameters');
                            }

                            $result =
                                (new ReservationAdder())->uploadData(
                                    (new FileWriterFactory())
                                        ->getInstance('db'),
                                    strval($room_id), strval($id), $from, $to,
                                );

                            if($result == \System\Status::RESERVATION_OK) {
                                return ( "Reservation added successfully" );
                            }
                            else {
                                return ( "ERROR: ".\System\Status::getString($result)[1]) ;
                            }

                        }
                    ],
                ],
            ]);

            // Request handling
            //
            $schema = new Schema([
                'query' => $queryType,
                'mutation' => $mutationType,
            ]);

            $rawInput = file_get_contents('php://input');
            if ($rawInput === false) {
                throw new \RuntimeException('Failed to get php://input');
            }

            $input = json_decode($rawInput, true);
            $query = $input['query'];
            $variableValues = $input['variables'] ?? null;

            $rootValue = ['prefix' => 'You said: '];
            $result = GraphQL::executeAndReturnResult(
                $schema, $query, $rootValue, null, $variableValues
            );
            $output = $result->toArray();
        } catch (\Throwable $e) {
            $output = [
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ];
        }



        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($output);
        die();

    }
}