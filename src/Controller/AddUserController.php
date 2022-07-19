<?php

namespace Controller;

use Router\Response;
use System\Status;
use System\Util\Authenticator;
use View\UserCreationFormView;

class AddUserController {


    /**
     * Function validates user creation request and redirects
     *
     * @return void
     */
    public function makeRequest() : void {
        $res = new Response();
        /*$res->send($_POST['name'].'<br>');
        $res->send($_POST['surname'].'<br>');
        $res->send($_POST['nickname'].'<br>');
        $res->send($_POST['password1'].'<br>');
        $res->send($_POST['password2'].'<br>');
        $res->send($_POST['email'].'<br>');
        $res->send("<a href='/'>Return</a>");*/

        $auth = new Authenticator();

        $code = $auth->register(
            $_POST['nickname'],
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['password1'],
            $_POST['password2'],
        );

        if($code == Status::REGISTER_OK) {
            $res->goTo('/userLogIn?status='.$code);
        }
        else {
           // $res->goTo('/userRegistration?status='.$code);
            $_POST['status'] = $code;
            (new UserCreationFormView())
                ->render();
        }
    }
}