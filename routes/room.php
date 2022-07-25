<?php declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;
use System\Util\Authenticator;
use System\Util\Session;


$sess = Session::getInstance();


$router = new Router(
    '404.html'
);

$router->get('/add', Authenticator::getLoginValidator(), function(Response $res) {
    (new \View\RoomFormView())
        ->render();
});

$router->get('/list', function(Response $res) {
    (new \View\RoomListingView())
        ->render();
});

$router->post('/add', Authenticator::getLoginValidator(), function(Response $res) {
    (new \Controller\AddRoomController())
        ->makeRequest();
});

$router->redirect();