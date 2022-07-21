<?php declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;

$router = new Router(
    '404.html'
);

$router->get('/add', function(Response $res) {
    (new \View\RoomFormView())
        ->render();
});

$router->get('/list', function(Response $res) {
    (new \View\RoomListingView())
        ->render();
});

$router->post('/add', function(Response $res) {
    (new \Controller\AddRoomController())
        ->makeRequest();
});

$router->redirect();