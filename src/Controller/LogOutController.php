<?php

namespace Controller;

use Router\Response;
use System\Util\Authenticator;
use System\Util\Session;

class LogOutController {
    public function makeRequest() : void {

        $auth = new Authenticator();

        $auth->logout();

        (new Response())
            ->goTo('/');
    }
}