<?php
declare(strict_types = 1);

use Router\Response;
use Router\Router;

require_once 'autoloading.php';

$router = new Router(
    'src/View/Index.php'
);

$router->use('/', function(Response $res) {
    $res->render('src/View/Index.php');
});


$router->use('/roomForm', function(Response $res) {
    $res->render("src/View/RoomForm.php");
});

$router->use('/roomListing', function(Response $res) {
    $res->render("src/View/RoomView.php");
});

$router->use('/roomReservationForm', function(Response $res) {
    $res->render("src/View/ReservationForm.php");
});

$router->use('/roomReservationListing', function(Response $res) {
    $res->render("src/View/ReservationView.php");
});

$router->use('/userLogIn', function(Response $res) {
    $res->render("src/View/UserLogInForm.php");
});

$router->use('/userRegistration', function(Response $res) {
    $res->render("src/View/UserCreationForm.php");
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
        ->makeRequst();
});

$router->redirect();