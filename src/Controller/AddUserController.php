<?php

namespace Controller;

use Router\Response;

class AddUserController {


    /**
     * Function validates user creation request and redirects
     *
     * @return void
     */
    public function makeRequest() : void {
        $res = new Response();
        $res->send($_POST['name'].'<br>');
        $res->send($_POST['surname'].'<br>');
        $res->send($_POST['nickname'].'<br>');
        $res->send($_POST['password1'].'<br>');
        $res->send($_POST['password2'].'<br>');
        $res->send($_POST['email'].'<br>');
        $res->send("<a href='/'>Return</a>");
    }
}