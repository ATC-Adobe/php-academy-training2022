<?php

namespace App\Api\Graphql;

use App\Controller\ReservationController;
use App\Model\Reservation;
use App\Service\AuthenticatorService;
use App\Service\ReservationService;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;


class ApiControllerGraphql
{
    public function graphql(): void
    {
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
            'fields' => [
                'reservations' => [
                    'type' => Type::listOf($reservationType),
                    'resolve' => function () {
                        return (new ReservationService())->readReservations();
                    }
                ],
                "activeReservations" => [
                    'type' => Type::listOf($reservationType),
                    'resolve' => function () {
                        $results = [];
                        $reservations = (new ReservationService())->readReservations();
                        foreach ($reservations as $reservation) {
                            if (strtotime($reservation->start_date) > time() || strtotime(
                                    $reservation->end_date
                                ) > time()) {
                                $results[] = $reservation;
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
                    'resolve' => function ($rootValue, array $args) {
                        $reservations = (new ReservationService())->findUsersReservations(intval($args['id']));
                        return $reservations;
                    }
                ]
            ]
        ]);
        $mutationType = new ObjectType([
            'name' => 'Mutation',
            'fields' => [
                'createReservation' => [
                    'type' => $reservationType,
                    'args' => [
                        'room_id' => Type::nonNull(Type::int()),
                        'user_id' => Type::nonNull(Type::int()),
                        'start_date' => Type::nonNull(Type::string()),
                        'end_date' => Type::nonNull(Type::string()),
                        'email' => Type::nonNull(Type::string()),
                        'password' => Type::nonNull(Type::string()),

                    ],
                    'resolve' => function ($rootValue, array $args) {
                        $reservation = new Reservation();
                        $reservationService = new ReservationService();
                        $reservation->user_id = $args["user_id"];
                        $reservation->room_id = $args["room_id"];
                        $reservation->start_date = $args["start_date"];
                        $reservation->end_date = $args["end_date"];

                        $auth = new AuthenticatorService();
                        $user = $auth->login($args['email'], $args['password']);
                        if (!$user) {
                            http_response_code(401);
                            return ["error" => "You are not logged in"];
                        }
                        ReservationController::formatDates($reservation);
                        if (!$reservationService->checkEndIsAfterStart(
                            $reservation->start_date,
                            $reservation->end_date
                        )) {
                            http_response_code(400);
                            return ["error" => "start date is after end date"];
                        }

                        if (!$reservationService->checkReservationCollision($reservation)) {
                            http_response_code(409);
                            return ["error" => "already occupied"];
                        }
                        if (!$reservationService->addReservation($reservation)) {
                            http_response_code(500);
                            return ["error" => "something went wrong!"];
                        }
                        return $reservation;
                    }
                ]
            ]
        ]);

        $schema = new Schema([
            'query' => $queryType,
            'mutation' => $mutationType
        ]);

        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);
        $query = $input['query'];
        $variableValues = $input['variables'] ?? null;
        $rootValue = ['prefix' => 'You said: '];

        try {
            $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
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
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($output);
    }
}

