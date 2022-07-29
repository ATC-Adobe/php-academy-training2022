<?php

namespace Api\GraphQLTypes;

use GraphQL\Type\Definition\ObjectType;

class GQLSingleton extends ObjectType {

    protected static ?GQLSingleton $instance = null;

    protected function __construct(array $config) {
        parent::__construct($config);
    }

    public static function getInstance() : GQLSingleton {

        return static::$instance ??= new static([]);
    }

}