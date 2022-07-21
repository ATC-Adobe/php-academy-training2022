<?php

declare(strict_types=1);

use System\Router\Response;
use System\Router\Router;
use System\Util\Session;
use View\IndexView;

$sess = Session::getInstance();

$router = new Router(
    '404.html'
);

$router->get('/', function(Response $res) {
    (new IndexView)->render();
});


$router->use('/', function(Response $res) {
    (new \View\IndexView())
        ->render();
});

$router->use('/roomForm', function(Response $res) {
    (new \View\RoomFormView())
        ->render();
});

$router->use('/roomListing', function(Response $res) {
    (new \View\RoomListingView())
        ->render();
});

$router->use('/roomReservationForm', function(Response $res) {
    (new \View\ReservationFormView())
        ->render();
});

$router->use('/roomReservationListing', function(Response $res) {
    (new \View\ReservationListingView())
        ->render();
});

$router->use('/userLogIn', function(Response $res) {
    (new \View\UserLogInFormView())
        ->render();
});

$router->use('/userRegistration', function(Response $res) {
    (new \View\UserCreationFormView())
        ->render();
});

$router->use('/userLogOut', function(Response $res) {
    (new \Controller\LogOutController())
        ->makeRequest();
});


$router->redirect();