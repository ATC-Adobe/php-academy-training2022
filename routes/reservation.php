<?php declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;
use System\Util\Authenticator;
use System\Util\Session;


$sess = Session::getInstance();


$router = new Router(
    '404.html'
);

// ============ POST =============

$router->post('/delete', Authenticator::getLoginValidator(), function(Response $res) {
    (new \Controller\RemoveReservationController())
        ->makeRequest();
});

$router->post('/add', Authenticator::getLoginValidator(), function(Response $res) {
    (new \Controller\AddReservationController())
        ->makeRequest();
});

// ============ GET =============

$router->get('/add', Authenticator::getLoginValidator(), function(Response $res) {
    (new \View\ReservationFormView())
        ->render();
});

$router->get('/list', function(Response $res) {
    (new \View\ReservationListingView())
        ->render();
});

$router->get('/user', Authenticator::getLoginValidator(), function(Response $res) {
    (new \View\UsersReservationListingView())
        ->render();
});


$router->get('/edit', Authenticator::getLoginValidator(), function(Response $res) {
    (new \View\ReservationEditFormView())
        ->render();
});


$router->post('/edit', Authenticator::getLoginValidator(), function(Response $res) {
    (new \Controller\EditReservationController())
        ->makeRequest();
});

$router->redirect();
