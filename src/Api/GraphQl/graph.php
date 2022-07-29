<?php

require_once "../../../vendor/autoload.php";

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Schema;
use GraphQL\GraphQL;
use Reservation\ReservationRepository;
use Reservation\ReservationService;

error_reporting(E_ERROR | E_PARSE);

//definiuje ścieżkę do zapytania. Jest to typ zapytania o rezerwacje
$reservationType = new ObjectType([
    'name' => 'reservations',
    'fields' => [
        'id' => ['type' => Type::int()],
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
]);

// rodzaje zapytań
$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        // nazwa zapytania
        'multiply' => [
            // jaki jest zwracany typ danych
            'type' => Type::int(),
            // jakie argumenty są przyjmowane (nonNull - musi być jakiś wpisany argument)
            'args' => [
                'number' => ["type" => Type::nonNull(Type::int())],
            ],
            //resolve to coś, co przygotowuje dane. W tym wypadku to funkcja na podnoszenie do potęgi, ale może być np repozytorium. Tu wpisuję funkcję
            'resolve' => function ($root, $args) {
                $multiply = $args['number'];
                return $multiply * $multiply;
            }
        ],

        'reservations' => [
            'type' => Type::listOf($reservationType),
            // dane potrzebne do zapytania w POSTMANie - chodzi o id użytkownika
            'args' => [
                'user_id' => ["type" => Type::int()]
            ],
            'resolve' => function ($root, $args) {
                if (isset($args['user_id'])) {
                    $repo = new ReservationRepository();
                    $userReservations = $repo->getMyReservations($args['user_id']);

                    $myReservation = [];
                    foreach ($userReservations as $userReservation) {
                        $myReservation[] = [
                            'id' => $userReservation['0'],
                            'roomId' => $userReservation['5'],
                            'userId' => $userReservation['id'],
                            'firstName' => $userReservation['firstName'],
                            'lastName' => $userReservation['lastName'],
                            'email' => $userReservation['email'],
                            'startDay' => $userReservation['startDay'],
                            'endDay' => $userReservation['endDay'],
                            'startHour' => $userReservation['startHour'],
                            'endHour' => $userReservation['endHour']
                        ];
                    }
                    return $myReservation;
                } else {
                    $repo = new ReservationRepository();
                    return $repo->getAllReservations();
                }
            }
        ],

        'available_reservations' => [
            'type' => Type::listOf($reservationType),
            'resolve' => function () {
                $repo = new ReservationRepository();
                return $repo->getCurrentlyAvailableReservations();
            }
        ]
    ]
]);

$mutationType = new ObjectType([
        'name' => 'Mutation',
        'fields' => [
            // nazwa zapytania
            'addReservation' => [
                // jaki zwracany typ danych
                'type' => Type::string(),
                // jakie argumenty są przyjmowane
                'args' => [
                    'userId' => ["type" => Type::nonNull(Type::int())],
                    'roomId' => ["type" => Type::nonNull(Type::int())],
                    'firstName' => ["type" => Type::nonNull(Type::string())],
                    'lastName' => ["type" => Type::nonNull(Type::string())],
                    'email' => ["type" => Type::nonNull(Type::string())],
                    'startDay' => ["type" => Type::nonNull(Type::string())],
                    'endDay' => ["type" => Type::nonNull(Type::string())],
                    'startHour' => ["type" => Type::nonNull(Type::string())],
                    'endHour' => ["type" => Type::nonNull(Type::string())]
                ],

                'resolve' => function ($root, $args) {
                    $repo = new ReservationService();
                    $repo->createReservation($args);
                    return "Success";
                    // TODO:dodać walidację do dodowania do bazy danych
                }
            ]
        ]
    ]
);

$schema = new Schema([
    "query" => $queryType,
    "mutation" => $mutationType
]);

try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];
    $variableValues = isset($input['variables']) ? $input['variables'] : null;
    $variableValues = [];
    $rootValue = null;
    $result = GraphQL::executeAndReturnResult($schema, $query, $rootValue, null, $variableValues);
    $output = $result->toArray();
} catch (\Exception $e) {
    $output = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}
header('Content-Type: application/json');
echo json_encode($output);