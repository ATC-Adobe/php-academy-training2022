<?php

namespace Api\GraphQLTypes;

use GraphQL\Type\Definition\Type;
use Model\Reservation\Service\ReservationAdder;
use System\File\FileWriterFactory;
use System\Util\Authenticator;

class GQLMutationType extends GQLSingleton {

    protected static ?GQLSingleton $instance;

    protected function __construct(array $config) {
        parent::__construct([
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
    }

}