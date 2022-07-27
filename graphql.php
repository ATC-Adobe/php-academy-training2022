<?php

require 'vendor/autoload.php';
require_once 'autoloading.php';


use Api\GraphQL\Reservations\TypeRegistry;
use GraphQL\GraphQL;
use GraphQL\Schema;


if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
    $rawBody = file_get_contents('php://input');
    $data = json_decode($rawBody ?: '', true);
} else {
    $data = $_POST;
}

$requestString = isset($data['query']) ? $data['query'] : null;
$operationName = isset($data['operation']) ? $data['operation'] : null;
$variableValues = isset($data['variables']) ? $data['variables'] : null;

try {
    $schema = new Schema([
        'query' => TypeRegistry::getQueryType(),
    ]);
    $result = GraphQL::execute(
        $schema,
        $requestString,
        null,
        null,
        $variableValues,
        $operationName
    );
} catch (Exception $exception) {
    $result = [
        'errors' => [
            ['message' => $exception->getMessage()]
        ]
    ];
}

header('Content-Type: application/json');
echo json_encode($result);