<?php

namespace Api;

use Api\GraphQLTypes\GQLDiceType;
use Api\GraphQLTypes\GQLMutationType;
use Api\GraphQLTypes\GQLQueryType;
use Api\GraphQLTypes\GQLReservationType;
use Api\GraphQLTypes\GQLRoomType;
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

            // Request handling
            $schema = new Schema([
                'query' => GQLQueryType::getInstance(),
                'mutation' => GQLMutationType::getInstance(),
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