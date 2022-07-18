<?php

namespace Controller;

use Router\Response;
use System\Util\Session;

class LogOutController {
    public function makeRequest() : void {
        $sess = Session::getInstance();

        $sess->destroy();

        (new Response())
            ->goTo('/');
    }
}