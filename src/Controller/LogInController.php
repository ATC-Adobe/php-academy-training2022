<?php

namespace Controller;

use System\Router\Response;
use System\Status;
use System\Util\Authenticator;

class LogInController {


    /**
     * Function validates login data and redirects to if login was successful
     *
     * @return void
     */
    public function makeRequest() : void {
        $res = (new Authenticator())
            ->login($_POST['username'], $_POST['password']);

        $resp = new Response();

        if($res === null) {
            $resp->goTo('/user/login?status='.Status::LOGIN_INVALID);
        }

        $resp->goTo('/reservation/user');
    }
}