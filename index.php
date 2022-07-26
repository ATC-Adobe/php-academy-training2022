<?php
declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;
use System\Util\Session;

require_once 'vendor/autoload.php';

$router = new Router(
    '404.html'
);

$router->use('/', function(Response $res) {
    $sess = Session::getInstance();
    (new \View\IndexView())
        ->render();
});

$router->use('/phpinfo', function(Response $res) {
    phpinfo();
});

$router->use('/test', function(Response $res) {
    $res->render('test.php');
});

$router->get('/r', function(Response $res) {
    echo match($_GET['r']) {
        'rooms' => 'curl -d \'{"query": "query { rooms }" }\' -H "Content-Type: application/json" localhost/test',
        default => ''
    };
    die();
});




// experimental router segregation
//$router->stage('/view',         'routes/view.php');
$router->stage('/room',         'routes/room.php');
$router->stage('/reservation',  'routes/reservation.php');
$router->stage('/user',         'routes/user.php');
$router->stage('/api',          'routes/api.php');

$router->redirect();