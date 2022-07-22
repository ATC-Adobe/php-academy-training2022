<?php

namespace Controller;

use System\Router\Response;
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

        $auth = new Authenticator();

        $code = $auth->register(
            htmlentities($_POST['nickname']),
            htmlentities($_POST['name']),
            htmlentities($_POST['surname']),
            htmlentities($_POST['email']),
            htmlentities($_POST['password1']),
            htmlentities($_POST['password2']),
        );

        if($code == Status::REGISTER_OK) {
            $res->goTo('/user/login?status='.$code);
        }
        else {
           // $res->goTo('/userRegistration?status='.$code);
            $_POST['status'] = $code;
            (new UserCreationFormView())
                ->render();
        }
    }
}