<?php

declare(strict_types=1);

use System\Router\Response;
use System\Router\Router;
use System\Util\Session;
use View\IndexView;

$sess = Session::getInstance();

$router = new Router(
    '404.html'
);

$router->redirect();