<?php

namespace Controller;

use System\Router\Response;
use System\Util\Authenticator;

class LogOutController {
    public function makeRequest() : void {

        $auth = new Authenticator();

        $auth->logout();

        (new Response())
            ->goTo('/');
    }
}