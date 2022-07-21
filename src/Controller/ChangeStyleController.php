<?php

namespace Controller;

use System\Router\Response;
use System\Util\Session;

class ChangeStyleController {
    public function makeRequest() {

        if(isset($_POST['option'])) {
            $sess = Session::getInstance();

            //echo $_POST['option'];

            $sess->set('style',
                match($_POST['option']) {
                    'style1' => 1,
                    'style2' => 2,
                    'style3' => 3,
                    default  => 0,
                }
            );
        }

        (new Response())
            ->goTo('/user/info');
    }
}