<?php declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;

$router = new Router(
    '404.html'
);

$router->get('/login', function(Response $res) {
    (new \View\UserLogInFormView())
        ->render();
});

$router->get('/add', function(Response $res) {
    (new \View\UserCreationFormView())
        ->render();
});

$router->post('/login', function(Response $res) {
    (new \Controller\LogInController())
        ->makeRequest();
});

$router->post('/add', function(Response $res) {
    (new \Controller\AddUserController())
        ->makeRequest();
});

$router->use('/logout', function(Response $res) {
    (new \Controller\LogOutController())
        ->makeRequest();
});

$router->get('/info', function(Response $res) {
    (new \View\UserProfileView())
        ->render();
});

$router->post('/style', function(Response $res) {
    (new \Controller\ChangeStyleController())
        ->makeRequest();
});


$router->redirect();