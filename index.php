<?php
require_once "./autoload.php";

use App\Router;

$router = new Router();

$roomController = new \App\Controller\RoomController();
$router->get('/', [$roomController, 'index']);
$router->get('/roomForm', [$roomController, 'create']);
$router->post('/roomForm', [$roomController, 'store']);

$reservationController = new \App\Controller\ReservationController();
$router->get('/reservations', [$reservationController, 'index']);
$router->get('/reservationForm', [$reservationController, 'create']);
$router->post('/reservationForm', [$reservationController, 'store']);
$router->post('/reservationDelete', [$reservationController, 'delete']);
$router->post('/reservationUpdate', [$reservationController, 'update']);
$router->get('/reservationUpdate', [$reservationController, 'edit']);

$router->get('/register', [new \App\Controller\RegisterController(), 'create']);
$router->get('/login', [new \App\Controller\LoginController(), 'create']);

$router->resolve();


