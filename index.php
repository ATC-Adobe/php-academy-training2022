<?php
declare(strict_types = 1);

use Router\Response;
use Router\Router;
use System\Util\Session;

require_once 'autoloading.php';

$sess = Session::getInstance();

$router = new Router(
    '404.html'
);

// experimental router segregation
$router->stage('/view', 'routes/view.php');

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

$router->use('/user/reservations', function(Response $res) {
    (new \View\UsersReservationListingView())
        ->render();
});


$router->post('/delete/reservation', function(Response $res) {
    (new \Controller\RemoveReservationController())
        ->makeRequest();
});

$router->post('/add/reservation', function(Response $res) {
    (new \Controller\AddReservationController())
        ->makeRequest();
});

$router->post('/add/room', function(Response $res) {
    (new \Controller\AddRoomController())
        ->makeRequest();
});


$router->post('/add/user', function(Response $res) {
    (new \Controller\AddUserController())
        ->makeRequest();
});

$router->post('/login', function(Response $res) {
    (new \Controller\LogInController())
        ->makeRequest();
});

$router->redirect();