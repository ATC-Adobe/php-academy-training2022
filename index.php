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


$router->use('/a', function(Response $res) {
    if(isset($_GET['a'])) {
        $res->send('AA');
    }
    $res->end("A");
});

$router->use('/b', function(Response $res) {
    $res->goTo('/a');
});

$router->use('/c', function(Response $res) {
    $res->goTo('/b?a=1');
});

// app.use('/', (req, res) => {

// });

$router->get('/f', function(Response $res) {
    $res->end("Nothing interesting to see here");
});

$router->get('/database', function(Response $res) {

    $repo = new \Reservation\Repository\ReservationConcreteRepository();

    $table = $repo->getAllReservations();

    foreach ($table as $entry) {
        $res->send($entry->getId().'<br>');
    }

    $res->end("");
});

$router->post('/delete/reservation', function(Response $res) {
    if(isset($_POST['id'])) {
        (new \Controller\RemoveReservationController())
            ->makeRequest();
    }

    $res->render('src/View/ReservationView.php');
});

$router->redirect(
    explode('?', $_SERVER['REQUEST_URI'])[0]
);