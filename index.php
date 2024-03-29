<?php
declare(strict_types = 1);

use Model\DateTimeFormatter;
use System\Router\Response;
use System\Router\Router;
use System\Util\Session;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleA;

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
    $di = new System\RandomStuff\DependencyInjection\DependencyInjection();
    $type = SampleA::class;
    echo class_exists($type);
    var_dump($type);
    var_dump($di->construct($type));
});

// experimental router segregation
//$router->stage('/view',         'routes/view.php');
$router->stage('/room',         'routes/room.php');
$router->stage('/reservation',  'routes/reservation.php');
$router->stage('/user',         'routes/user.php');
$router->stage('/api',          'routes/api.php');

$router->redirect();