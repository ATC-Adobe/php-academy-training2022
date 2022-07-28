<?php
declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;
use System\Util\Session;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

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
    include "layout/test.html";
});

$router->get('/rabbit', function() {
    $fibonacci_rpc = new \System\RabbitMQ\ReservationProducer();
    $response = $fibonacci_rpc->call(40, 40, new \DateTime(), new \DateTime());
    echo ' [.] Got ', $response, "\n";
});

$router->get('/test', function() {

    $tries = 0;
    $sum = 0;

    for($i = 1; $i <= 6; $i++) {
        for($j = 1; $j <= 6; $j++) {
            for($k = 1; $k <= 8; $k++) {

                $arr = [$i, $j, $k];
                sort($arr);

                $tries++;

                $sum += $arr[2] + $arr[1];
            }
        }
    }

    echo $tries.'<br>';
    echo $sum.'<br>';
    echo $sum/$tries.'<br>';

    $tries = 0;
    $sum = 0;

    for($i = 1; $i <= 6; $i++) {
        for($j = 1; $j <= 6; $j++) {


                $tries++;

                $sum += $i+$j;

        }
    }

    echo $tries.'<br>';
    echo $sum.'<br>';
    echo $sum/$tries.'<br>';
});


// experimental router segregation
//$router->stage('/view',         'routes/view.php');
$router->stage('/room',         'routes/room.php');
$router->stage('/reservation',  'routes/reservation.php');
$router->stage('/user',         'routes/user.php');
$router->stage('/api',          'routes/api.php');

$router->redirect();