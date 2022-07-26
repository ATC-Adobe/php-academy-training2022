<?php

use Model\Reservation\Service\ReservationAdder;
use System\File\FileWriterFactory;
use \System\Router\Response;
use System\Router\Router;
use System\Util\Authenticator;

$router = new Router('404.html');

$router->get('/', function() {
    (new \Api\GraphQLRequestHandler())->graphQL();
});

$router->get('/rooms', function (Response $res, ArrayIterator $arg) {
    (new \Controller\ApiController())
        ->getRooms();
});

$router->get('/reservations', function (Response $res, ArrayIterator $arg) {
    (new \Controller\ApiController())
        ->getActiveReservations();
});


$router->get('/user', function (Response $res, ArrayIterator $arg) {
    (new \Controller\ApiController())
        ->getUserReservations($arg);
});

$router->post('/reservations',
    Authenticator::getHTTPLoginValidator(),
    function (Response $res, ArrayIterator $arg) {

        (new \Controller\ApiController())
            ->addReservation();
});

$router->redirect();