<?php

namespace View;

use Router\Response;

class UsersReservationListingView {
    public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/UsersReservationView.php');
    }
}