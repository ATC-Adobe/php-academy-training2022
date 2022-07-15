<?php

namespace Controller;

use Router\Response;

class LogInController {
    public function makeRequest() : void {
        $res = new Response();
        $res->end("
            Log in attempt<br>
            <a href='/'>Return</a>
        ");
    }
}