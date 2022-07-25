<?php declare(strict_types = 1);

use System\Router\Response;
use System\Router\Router;
use \System\Util\Authenticator;
use System\Util\Session;

$sess = Session::getInstance();

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

$router->use('/logout', Authenticator::getLoginValidator(), function(Response $res) {
    (new \Controller\LogOutController())
        ->makeRequest();
});

$router->get('/info', function(Response $res) {
    (new \View\UserProfileView())
        ->render();
});

$router->post('/style', Authenticator::getLoginValidator(), function(Response $res) {
    (new \Controller\ChangeStyleController())
        ->makeRequest();
});

$router->get('/edit', Authenticator::getLoginValidator(), function (Response $res) {
    (new \View\UserEditorView())
        ->render();
});

$router->post('/edit', Authenticator::getLoginValidator(), function (Response $res) {
    (new \Controller\EditUserProfileController())
        ->makeRequest();
});

$router->post('/password', Authenticator::getLoginValidator(), function (Response $res) {
    (new \Controller\ChangePasswordController())
        ->makeRequest();
});

$router->redirect();