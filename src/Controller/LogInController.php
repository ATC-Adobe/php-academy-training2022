<?php

namespace Controller;

use Router\Response;

class LogInController {


    /**
     * Function validates login data and redirects to if login was successful
     *
     * @return void
     */
    public function makeRequest() : void {
        $res = new Response();
        $res->end("
            Log in attempt<br>
            <a href='/'>Return</a>
        ");
    }
}