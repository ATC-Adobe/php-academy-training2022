<?php

namespace Api\GraphQLTypes;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GQLDiceType extends GQLSingleton {

    protected static ?GQLSingleton $instance = null;

    protected function __construct() {
        parent::__construct([
            'name' => 'Dice',
            'fields' => [
                'tries'     => [ 'type' => Type::int() ],
                'sum'       => [ 'type' => Type::int() ],
                'ssq'       => [ 'type' => Type::int() ],
                'exp'       => [ 'type' => Type::float() ],
                'var'       => [ 'type' => Type::float() ],
            ]
        ]);
    }

    public static function getResolver() : callable {
        return function($root, $args) {

            $count = 0;
            $sum = 0;
            $ssq = 0;

            for ($i = 1; $i <= $args['dice'][0]; $i++) {
                for ($j = 1; $j <= $args['dice'][1]; $j++) {
                    for ($k = 1; $k <= $args['dice'][2]; $k++) {

                        $arr = [$i, $j, $k];

                        $s = 0;

                        sort($arr);

                        foreach ($args['include'] as $pos) {
                            $s += $arr[$pos];
                        }

                        $sum += $s;
                        $ssq += $s * $s;
                        $count++;
                    }
                }
            }

            $exp = $sum / $count;
            $var = $ssq / $count - $exp * $exp;

            return ['tries' => $count, 'ssq' => $ssq, 'sum' => $sum, 'exp' => $exp, 'var' => $var];
        };
    }

}