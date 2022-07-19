<?php

namespace Controller;

use Router\Response;
use System\Status;
use System\Util\Authenticator;
use System\Util\Session;

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
            $resp->goTo('/userLogIn?status='.Status::LOGIN_INVALID);
        }

        $resp->goTo('/user/reservations');
    }
}