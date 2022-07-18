<?php
require_once "./autoload.php";

use App\Model\Session;
use App\Router;

$router = new Router();
Session::getInstance()->start();

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

$registerController = new \App\Controller\RegisterController();
$router->get('/register', [$registerController, 'create']);
$router->post('/register', [$registerController, 'store']);

$loginController = new \App\Controller\LoginController();
$router->get('/login', [$loginController, 'create']);
$router->post('/login', [$loginController, 'store']);
$router->get('/logout', [$loginController, 'logout']);


$router->resolve();


