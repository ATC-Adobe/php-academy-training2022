<?php

namespace Api\GraphQl;

use GraphQL\Type\Definition\ObjectType;

use Reservation\ReservationRepository;
use System\Database\MysqlConnection;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Mock',
            'fields' => [
                'reservations' => [
                    'type' => TypeRegistry::getBoxType(),
                    'resolve' => function () {
                        $connection = MysqlConnection::getInstance();
                        $query = "SELECT * FROM reservations";
                        $queryResult = $connection->query($query)->fetchAll();
//                        $reservations = [];
                        foreach ($queryResult as $res) {
                            $reservations[] =
                                [
                                    'reservation_id' => $res['reservation_id'],
                                    'room_id' => $res['room_id'],
                                    'user_id' => $res['id_user'],
                                    'firstname' => $res['firstname'],
                                    'lastname' => $res['lastname'],
                                    'email' => $res['email'],
                                    'start_date' => $res['start_date'],
                                    'end_date' => $res['end_date']
                                ];
                        }
                        return [
                            'reservationId' => $res['reservation_id'],
                            'roomId' => $res['room_id'],
                            'userId' => $res['id_user'],
                            'firstName' => $res['firstname'],
                            'lastName' => $res['lastname'],
                            'email' => $res['email'],
                            'startDate' => $res['start_date'],
                            'endDate' => $res['end_date']
                        ];
                    }
                ]
            ]
        ];
        parent::__construct($config);
    }
}