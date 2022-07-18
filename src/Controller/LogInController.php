<?php

namespace Controller;

use Router\Response;
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
            $resp->goTo('/userLogIn?status=2');
        }

        $sess = Session::getInstance();

        $sess->create();

        $sess->set('valid',     true);
        $sess->set('username',  $res->getNickname());
        $sess->set('name',      $res->getName());
        $sess->set('surname',   $res->getSurname());
        $sess->set('email',     $res->getEmail());

        $resp->goTo('/');
    }
}