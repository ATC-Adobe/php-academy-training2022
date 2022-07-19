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

$router->use('/', function(Response $res) {
    (new \View\IndexView())
        ->render();
});

$router->use('/test', function(Response $res) {
    include 'DependencyInjection.php';
    die();
});


// experimental router segregation
$router->stage('/view',         'routes/view.php');
$router->stage('/room',         'routes/room.php');
$router->stage('/reservation',  'routes/reservation.php');
$router->stage('/user',         'routes/user.php');

$router->redirect();