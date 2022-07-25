<?php
require_once "./autoload.php";

use App\Api\ApiControllerJson;
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
$router->get('/userReservations', [$reservationController, 'show']);

$registerController = new \App\Controller\RegisterController();
$router->get('/register', [$registerController, 'create']);
$router->post('/register', [$registerController, 'store']);

$loginController = new \App\Controller\LoginController();
$router->get('/login', [$loginController, 'create']);
$router->post('/login', [$loginController, 'store']);
$router->get('/logout', [$loginController, 'logout']);

$userController = new \App\Controller\UserController();
$router->get("/user", [$userController, "show"]);
$router->get("/user/edit", [$userController, "edit"]);
$router->post("/user/edit", [$userController, "update"]);
$router->get("/user/password", [$userController, "editPassword"]);
$router->post("/user/password", [$userController, "updatePassword"]);

$apiController = new ApiControllerJson();
$router->get("/api/reservations", [$apiController, "listReservations"]);
$router->get("/api/activeReservations", [$apiController, "listActiveReservations"]);
$router->get("/api/usersReservations", [$apiController, "listUsersReservations"]);
$router->post("/api/addReservation", [$apiController, "addReservation"]);


$router->resolve();


