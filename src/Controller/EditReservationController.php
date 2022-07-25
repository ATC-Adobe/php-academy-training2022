<?php

namespace Controller;

use System\Router\Response;

class EditReservationController {

    public function makeRequest() {

        (new Response())
            ->goTo('/');
    }
}