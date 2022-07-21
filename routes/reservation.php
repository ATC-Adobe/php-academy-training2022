<?php declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;

$router = new Router(
    '404.html'
);

// ============ POST =============

$router->post('/delete', function(Response $res) {
    (new \Controller\RemoveReservationController())
        ->makeRequest();
});

$router->post('/add', function(Response $res) {
    (new \Controller\AddReservationController())
        ->makeRequest();
});

// ============ GET =============

$router->get('/add', function(Response $res) {
    (new \View\ReservationFormView())
        ->render();
});

$router->get('/list', function(Response $res) {
    (new \View\ReservationListingView())
        ->render();
});

$router->get('/user', function(Response $res) {
    (new \View\UsersReservationListingView())
        ->render();
});

$router->redirect();
