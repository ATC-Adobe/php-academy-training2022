<?php
declare(strict_types = 1);

use Router\Response;
use Router\Router;

require_once 'autoloading.php';

$sess = \System\Util\Session::getInstance();
$sess->create();

$router = new Router(
    '404.html'
);

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

$router->use('/sessinfo', function(Response $res) {

    $sess = \System\Util\Session::getInstance();

    $res->send($sess->get('name').'<br>');
    $res->send($sess->get('surname').'<br>');
    $res->send($sess->get('username').'<br>');
    $res->send($sess->get('email').'<br>');
    $res->end('<a href="/">Return</a>');
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

$router->get('/test', function(Response $res) {
    $auth = new \System\Util\Authenticator();

    for($i = 0 ; $i <= 6; $i++) {
        $val =  $auth->passwordHash('abc', '');
        echo $auth->passwordVerify('abc', '', $val) ? '1' : '0';
    }
    //die();
});

$router->redirect();