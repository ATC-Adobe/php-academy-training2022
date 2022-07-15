<?php
require_once "./autoload.php";

use App\Router;

$router = new Router();
$router->get('/', [(new \App\Controller\RoomController()), 'index']);
$router->get('/reservations', [new \App\Controller\ReservationController(), 'index']);
$router->get('/reservationForm', [new \App\Controller\ReservationController(), 'create']);
$router->post('/reservationForm', [new \App\Controller\ReservationController(), 'store']);
$router->post('/reservationDelete', [new \App\Controller\ReservationController(), 'delete']);
$router->get('/roomForm', [new \App\Controller\RoomController(), 'create']);
$router->post('/roomForm', [new \App\Controller\RoomController(), 'store']);
$router->get('/register', [new \App\Controller\RegisterController(), 'create']);
$router->get('/login', [new \App\Controller\LoginController(), 'create']);

$router->resolve();


