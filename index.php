<?php
declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;
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

    $res = htmlentities("abcefg<>");

    var_dump($res);

});


$router->use('/phpinfo', function(Response $res) {
    phpinfo();
});


// experimental router segregation
//$router->stage('/view',         'routes/view.php');
$router->stage('/room',         'routes/room.php');
$router->stage('/reservation',  'routes/reservation.php');
$router->stage('/user',         'routes/user.php');

$router->redirect();